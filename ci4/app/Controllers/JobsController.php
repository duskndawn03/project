<?php

namespace App\Controllers;

use App\Models\JobsModel;

class JobsController extends BaseController
{
    public function index()
    {
        $jobsModel = new JobsModel();
        $jobs = $jobsModel->getAllJobs(); // Fetch all jobs
        $selectedJob = $jobsModel->getFirstJob(); // Fetch the first job as default

        return view('jobs/index', [
            'jobs' => $jobs,
            'selectedJob' => $selectedJob,
        ]);
    }
}
