<?php

namespace App\Models;

use CodeIgniter\Model;

class AlumniModel extends Model
{
    protected $table = 'alumni';
    protected $primaryKey = 'sl_no';

    protected $allowedFields = [
        'graduation_institute',
        'admission_year',
        'batch_name_no',
        'roll_no',
        'name',
        'contact_no',
        'additional_contact',
        'email_address',
        'additional_email',
        'fb_id_link',
        'linkedin_id_link',
        'blood_group',
        'current_occupation',
        'institution_name',
        'professional_history',
        'present_address',
        'permanent_address',
        'area_of_expertise',
        'remarks',
        'approval'
    ];

    public function getVisibleColumns()
    {
        $db = db_connect();
        $query = $db->query("SELECT column_name FROM column_visibility WHERE is_visible = 1");

        return array_column($query->getResultArray(), 'column_name');
    }

    public function getAlumniData(array $columnsToDisplay)
    {
        $selectColumns = implode(', ', $columnsToDisplay);
        return $this->select($selectColumns)
                    ->where('approval !=', 'pending')
                    ->findAll();
    }
}
