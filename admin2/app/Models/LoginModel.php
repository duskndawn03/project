<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table      = 'admins';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'password'];
    
    // Enable automatic timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
}
