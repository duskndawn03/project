<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\SubcategoryModel;

class ProductsController extends BaseController
{
    protected $categoryModel;
    protected $subcategoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
        $this->subcategoryModel = new SubcategoryModel();
    }
    public function index()
    {
        $categories = $this->categoryModel->findAll();
        $subcategories = $this->subcategoryModel
            ->select('product_subcategories.*, product_categories.category_name')
            ->join('product_categories', 'product_subcategories.category_id = product_categories.category_id')
            ->findAll();

        return view('products/index', [
            'categories' => $categories,
            'subcategories' => $subcategories
        ]);
        
    }
}
