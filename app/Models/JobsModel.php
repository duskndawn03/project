<?php

namespace App\Models;

use CodeIgniter\Model;

class JobsModel extends Model
{
    protected $table = 'jobs';
    protected $primaryKey = 'jobs_id';
    protected $allowedFields = [
        'jobs_post_name',
        'jobs_company_name',
        'jobs_skills',
        'jobs_description',
        'jobs_salary',
        'jobs_expertise_level'
    ];

    // Fetch all jobs from the database
    public function getAllJobs()
    {
        return $this->findAll();
    }

    // Fetch the first job as the default selected job
    public function getFirstJob()
    {
        return $this->orderBy('jobs_id', 'ASC')->first();
    }
}
