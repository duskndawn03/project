<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

class DatabaseSchema extends Controller
{
    public function index()
    {
        $db = Database::connect();
        $tables = $db->listTables();

        $schema = [];
        foreach ($tables as $table) {
            // Fetch field data
            $fields = $db->getFieldData($table);
            $rawColumns = $db->query("SHOW COLUMNS FROM $table")->getResult();

            // Fetch table status for engine, row count, and auto increment value
            $tableStatus = $db->query("SHOW TABLE STATUS WHERE Name = ?", [$table])->getRow();

            // Fetch foreign key constraints
            $foreignKeys = $db->query("
                SELECT 
                    k.COLUMN_NAME, 
                    k.CONSTRAINT_NAME, 
                    k.REFERENCED_TABLE_NAME, 
                    k.REFERENCED_COLUMN_NAME, 
                    r.DELETE_RULE, 
                    r.UPDATE_RULE
                FROM information_schema.KEY_COLUMN_USAGE k
                JOIN information_schema.REFERENTIAL_CONSTRAINTS r
                    ON k.CONSTRAINT_NAME = r.CONSTRAINT_NAME
                WHERE k.TABLE_NAME = ?
                AND k.TABLE_SCHEMA = DATABASE() 
                AND k.REFERENCED_TABLE_NAME IS NOT NULL", [$table])->getResult();

            // Map auto_increment status from raw columns
            $autoIncrementMap = [];
            foreach ($rawColumns as $column) {
                $autoIncrementMap[$column->Field] = strpos($column->Extra, 'auto_increment') !== false;
            }

            $schema[$table] = [
                'columns' => [],
                'indexes' => $db->getIndexData($table),
                'foreign_keys' => [],
                'engine' => $tableStatus->Engine ?? 'N/A',
                'auto_increment' => $tableStatus->Auto_increment ?? 'N/A',
                'row_count' => $tableStatus->Rows ?? 'N/A',
                'collation' => $tableStatus->Collation ?? 'N/A',
            ];

            // Process columns
            foreach ($fields as $field) {
                $schema[$table]['columns'][] = [
                    'name' => $field->name,
                    'type' => $field->type,
                    'max_length' => $field->max_length ?? 'N/A',
                    'nullable' => $field->nullable ?? false,
                    'default' => $field->default ?? 'N/A',
                    'primary_key' => $field->primary_key ?? false,
                    'extra' => $autoIncrementMap[$field->name] ? 'AUTO_INCREMENT' : '',
                    'comment' => $db->query("SELECT COLUMN_COMMENT FROM information_schema.COLUMNS WHERE TABLE_NAME = ? AND COLUMN_NAME = ? AND TABLE_SCHEMA = DATABASE()", [$table, $field->name])->getRow()->COLUMN_COMMENT ?? '',
                ];
            }

            // Process foreign keys
            foreach ($foreignKeys as $fk) {
                $schema[$table]['foreign_keys'][] = [
                    'column' => $fk->COLUMN_NAME,
                    'referenced_table' => $fk->REFERENCED_TABLE_NAME,
                    'referenced_column' => $fk->REFERENCED_COLUMN_NAME,
                    'on_delete' => $fk->DELETE_RULE,
                    'on_update' => $fk->UPDATE_RULE,
                ];
            }
        }

        // Return schema as JSON
        return $this->response->setContentType('application/json')
                              ->setJSON($schema);
    }
}
