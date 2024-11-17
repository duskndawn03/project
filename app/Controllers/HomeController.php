<?php

namespace App\Controllers;

use App\Models\ProductsModel;

class HomeController extends BaseController
{
    public function index()
    {
        $model = new ProductsModel();

        $data['products'] = $model->getProducts();

        // echo "<pre>"    ;
        // print_r($data);
        // echo "</pre>"   ;

        return view('home', $data);
    }
}
