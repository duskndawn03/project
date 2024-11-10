<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // Check if the user is logged in by checking a session variable
        if (! session()->get('is_logged_in')) {
            // Redirect to login page if the session is not set
            return redirect()->to('/login');  // Assuming the login route is '/login'
        }

        // User is logged in, proceed with the dashboard logic
        return view('home');
    }
}
