<?php

namespace App\Controllers;

use App\Models\AlumniModel;

class AlumniController extends BaseController {
    public function index() {
        $alumniModel = new AlumniModel();
        
        // Fetch the visible columns
        $visibleColumns = $alumniModel->getVisibleColumns();

        // Exclude 'approval' column and filter records where approval is not 'pending'
        $columnsToDisplay = array_diff($visibleColumns, ['approval']);
        
        // Fetch alumni data based on visible columns
        $alumniData = $alumniModel->getAlumniData($columnsToDisplay);

        return view('alumni/index', [
            'columnsToDisplay' => $columnsToDisplay,
            'alumniData' => $alumniData
        ]);
    }

    public function diplayRegisterAlumni() {

        // Display the registration form
        $success_message = session()->getFlashdata('success_message');
        return view('alumni/alumnireg', ['success_message' => $success_message]);
    }

    public function RegisterAsAlumni() {
        // Get the form data
        $data = [
            'graduation_institute' => $this->request->getPost('graduation_institute'),
            'admission_year' => $this->request->getPost('admission_year'),
            'batch_name_no' => $this->request->getPost('batch_name_no'),
            'roll_no' => $this->request->getPost('roll_no'),
            'name' => $this->request->getPost('name'),
            'contact_no' => $this->request->getPost('contact_no'),
            'additional_contact' => $this->request->getPost('additional_contact'),
            'email_address' => $this->request->getPost('email_address'),
            'additional_email' => $this->request->getPost('additional_email'),
            'fb_id_link' => $this->request->getPost('fb_id_link'),
            'linkedin_id_link' => $this->request->getPost('linkedin_id_link'),
            'blood_group' => $this->request->getPost('blood_group'),
            'current_occupation' => $this->request->getPost('current_occupation'),
            'institution_name' => $this->request->getPost('institution_name'),
            'professional_history' => $this->request->getPost('professional_history'),
            'present_address' => $this->request->getPost('present_address'),
            'permanent_address' => $this->request->getPost('permanent_address'),
            'area_of_expertise' => $this->request->getPost('area_of_expertise'),
            'remarks' => $this->request->getPost('remarks'),
        ];

        // Save the data using the model
        $alumniModel = new AlumniModel();
        if ($alumniModel->saveAlumniData($data)) {
            // Set a success message and redirect back to the form
            session()->setFlashdata('success_message', 'Registration successful!');
            return redirect()->to('/ipe/alumni/reg'); // Adjust this to your route
        } else {
            // If validation fails, redirect back with input data and errors
            return redirect()->back()->withInput()->with('errors', $alumniModel->errors());
        }
    }
}
