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
    private function getColumns(){
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

    public function updateVisibility(){
        $columnVisibilityModel = new ColumnVisibilityModel();
        // Get POST data and update visibility
        $postData = $this->request->getPost();
        $columnVisibilityModel->updateVisibility($postData);
        return redirect()->to('/alumni'); // Redirect back to alumni page
    }

    // Method to delete alumni record
    public function deleteAlumni() {
        // Get the POST data (alumni_id)
        $id = $this->request->getPost('alumni_id');

        // Check if the ID is valid
        if ($id !== null) {
            // Load the AlumniModel
            $alumniModel = new AlumniModel();

            // Attempt to delete the alumni by ID
            $success = $alumniModel->deleteAlumniById($id);

            if ($success) {
                // If delete successful, return success JSON response
                return $this->response->setJSON([
                    'status' => 'success'
                ]);
            } else {
                // If delete failed, return error JSON response
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Failed to delete alumni record.'
                ]);
            }
        } else {
            // If no ID is provided, return an error message
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid alumni ID.'
            ]);
        }
    }

    public function updateApproval() {
        $alumniModel = new AlumniModel();
        $postData = $this->request->getPost();
        $id = $postData['alumni_id'];
    
        // Ensure alumni ID is provided
        if (empty($id)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'No alumni ID provided.'
            ]);
        }
    
        // Update approval status
        $success = $alumniModel->updateApproval($id);
    
        if ($success) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Approval status updated successfully.'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Alumni not found or failed to update.'
            ]);
        }
    }

    // Method to export alumni data to CSV
    public function exportAlumni() {
        // Load the AlumniModel
        $alumniModel = new AlumniModel();

        // Get all alumni data
        $alumniData = $alumniModel->getAllAlumni();

        // Set headers to trigger a CSV file download
        $this->response->setHeader('Content-Type', 'text/csv; charset=utf-8');
        $this->response->setHeader('Content-Disposition', 'attachment; filename=alumni_export.csv');

        // Create a file pointer connected to the output stream
        $output = fopen('php://output', 'w');

        // Add the column headers to the CSV file
        fputcsv($output, array(
            'sl_no', 'graduation_institute', 'admission_year', 'batch_name_no', 'roll_no', 'name', 
            'contact_no', 'additional_contact', 'email_address', 'additional_email', 'fb_id_link', 
            'linkedin_id_link', 'blood_group', 'current_occupation', 'institution_name', 'professional_history', 
            'present_address', 'permanent_address', 'area_of_expertise', 'remarks', 'approval'
        ));

        // Add rows to the CSV file
        foreach ($alumniData as $row) {
            fputcsv($output, $row); // Write each row from alumni data to the CSV
        }

        // Close the file pointer
        fclose($output);
    }

    public function importAlumni() {
        // Check if a file is uploaded
        if ($this->request->getFile('csvFile')->isValid()) {
            $csvFile = $this->request->getFile('csvFile');
            $fileName = $csvFile->getTempName();

            // Open the CSV file
            if (($file = fopen($fileName, "r")) !== FALSE) {
                $alumniModel = new \App\Models\AlumniModel();
                $alumniData = [];

                // Skip the first row if it's a header
                fgetcsv($file);

                // Loop through each row of the file
                while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
                    $alumniData[] = [
                        'graduation_institute' => $column[0],
                        'admission_year' => $column[1],
                        'batch_name_no' => $column[2],
                        'roll_no' => $column[3],
                        'name' => $column[4],
                        'contact_no' => $column[5],
                        'additional_contact' => $column[6],
                        'email_address' => $column[7],
                        'additional_email' => $column[8],
                        'fb_id_link' => $column[9],
                        'linkedin_id_link' => $column[10],
                        'blood_group' => $column[11],
                        'current_occupation' => $column[12],
                        'institution_name' => $column[13],
                        'professional_history' => $column[14],
                        'present_address' => $column[15],
                        'permanent_address' => $column[16],
                        'area_of_expertise' => $column[17],
                        'remarks' => $column[18],
                        'approval' => $column[19]
                    ];
                }

                // Insert all data in batch
                if ($alumniModel->insertAlumniFromCSV($alumniData)) {
                    fclose($file);
                    return redirect()->to('/alumni')->with('success', 'Alumni data imported successfully.');
                }

                fclose($file);
                return redirect()->back()->with('error', 'Error inserting alumni data.');
            }
        }

        return redirect()->back()->with('error', 'Please upload a valid CSV file.');
    }


}
