<?php

namespace App\Controllers;

use App\Models\ProductsModel;

class HomeController extends BaseController
{
    public function index()
    {
        $model = new ProductsModel();

        $data['products'] = $model->getProducts();

        return view('home', $data);
    }
}
