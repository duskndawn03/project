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
    public function getAlumniWithVisibility($visibility){
        $columns = [];
        foreach ($visibility as $column => $isVisible) {
            if ($isVisible) {
                $columns[] = $column;
            }
        }
        return $this->select($columns)->findAll();
    }
    
    public function updateApproval($id) {
        // Get the current approval status
        $currentApproval = $this->select('approval')->where('sl_no', $id)->get()->getRow();
        
        // Check if alumni exists
        if (!$currentApproval) {
            return false; // Alumni not found
        }
    
        $currentApproval = $currentApproval->approval;
        
        // Toggle the approval status
        $newApproval = ($currentApproval === 'pending') ? 'granted' : 'pending';
        
        // Update the approval status in the database
        return $this->set('approval', $newApproval)->where('sl_no', $id)->update();
    }

    // Method to delete an alumni record by ID
    public function deleteAlumniById($id) {
        // Perform the delete operation
        return $this->where('sl_no', $id)->delete();
    }

    // Method to get all alumni data
    public function getAllAlumni() {
        return $this->findAll(); // Get all alumni data from the table
    }

    // Method to fetch alumni details by ID
    public function getAlumniById($alumniId) {
        return $this->where('sl_no', $alumniId)->first();
    }

    public function updateAlumniById($alumni_id, $data)
    {
        return $this->update($alumni_id, $data);
    }

    // Method to insert multiple alumni records from CSV data
    public function insertAlumniFromCSV($alumniData) {
        if (!empty($alumniData)) {
            return $this->insertBatch($alumniData);
        }
        return false;
    }
}