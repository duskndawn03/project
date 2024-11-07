<?php
namespace App\Models;

use CodeIgniter\Model;

class AlumniModel extends Model
{
    protected $table      = 'alumni';
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

    // Optionally, method to get alumni with specific visibility
    public function getAlumniWithVisibility($visibility)
    {
        $columns = [];
        foreach ($visibility as $column => $isVisible) {
            if ($isVisible) {
                $columns[] = $column;
            }
        }
        return $this->select($columns)->findAll();
    }
}