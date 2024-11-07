<?php

namespace App\Models;

use CodeIgniter\Model;

class ColumnVisibilityModel extends Model
{
    protected $table      = 'column_visibility';
    protected $primaryKey = 'column_name';

    protected $allowedFields = ['column_name', 'is_visible'];

    // Optionally, you can add a method to get the visibility of all columns
    public function getColumnVisibility()
    {
        return $this->findAll();
    }

    // Optionally, method to update visibility for all columns at once
    public function updateVisibility($data)
    {
        foreach ($data as $column => $isVisible) {
            $this->update($column, ['is_visible' => $isVisible]);
        }
    }
}
