<?php

namespace App\Controllers;

class CalculatorsController extends BaseController
{
    public function index()
    {
        return view('calculators/index');
    }
    public function length()
    {
        return view('calculators/lengthconverter');
    }
    public function area()
    {
        return view('calculators/areacalc');
    }
    public function weight()
    {
        return view('calculators/weightandmass');
    }
    public function temperature()
    {
        return view('calculators/tempconv');
    }
    public function datetime()
    {
        return view('calculators/datetime');
    }
}
