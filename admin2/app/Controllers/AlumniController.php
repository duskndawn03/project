<?php
namespace App\Controllers;

use App\Models\AlumniModel;
use App\Models\ColumnVisibilityModel;

class AlumniController extends BaseController
{
    public function index(){
        // Load the models
        $alumniModel = new AlumniModel();
        $columnVisibilityModel = new ColumnVisibilityModel();

        // Fetch column visibility settings
        $visibility = $columnVisibilityModel->getColumnVisibility();
        $visibilityData = [];
        foreach ($visibility as $column) {
            $visibilityData[$column['column_name']] = $column['is_visible'];
        }

        // Fetch alumni data, respecting visibility settings
        $alumni = $alumniModel->findAll();

        // Data to pass to the view
        $data = [
            'columns' => $this->getColumns(), // This could be a predefined column structure (similar to your original)
            'visibility' => $visibilityData,
            'alumni' => $alumni
        ];

        // Return the view with the data
        return view('alumni', $data);
    }

    // Helper function to return the column names
    private function getColumns()
    {
        return [
            'sl_no' => 'Sl No.',
            'graduation_institute' => 'Graduation Institute',
            'admission_year' => 'Admission Year',
            'batch_name_no' => 'Batch Name & No',
            'roll_no' => 'Roll No.',
            'name' => 'Name',
            'contact_no' => 'Contact No.',
            'additional_contact' => 'Additional Contact',
            'email_address' => 'Email Address',
            'additional_email' => 'Additional Email',
            'fb_id_link' => 'FB ID Link',
            'linkedin_id_link' => 'LinkedIn ID Link',
            'blood_group' => 'Blood Group',
            'current_occupation' => 'Current Occupation',
            'institution_name' => 'Institution Name',
            'professional_history' => 'Professional History',
            'present_address' => 'Present Address',
            'permanent_address' => 'Permanent Address',
            'area_of_expertise' => 'Area of Expertise',
            'remarks' => 'Remarks',
            'approval' => 'Approval'
        ];
    }

    public function updateVisibility()
    {
        $columnVisibilityModel = new ColumnVisibilityModel();

        // Get POST data and update visibility
        $postData = $this->request->getPost();
        $columnVisibilityModel->updateVisibility($postData);

        return redirect()->to('/alumni'); // Redirect back to alumni page
    }
}
