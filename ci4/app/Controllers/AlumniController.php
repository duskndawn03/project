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
}
