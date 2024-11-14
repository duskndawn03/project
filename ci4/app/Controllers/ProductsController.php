<?php

namespace App\Controllers;

class ProductsController extends BaseController
{
    public function index()
    {
        return view('products/index');
    }
}
