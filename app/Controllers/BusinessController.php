<?php

namespace App\Controllers;

use App\Models\BusinessModel;

class BusinessController extends BaseController
{
    public function index()
    {
        return view('business/index');
    }
}
