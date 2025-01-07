<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\SubcategoryModel;
use App\Models\ProductSliderImagesModel;
use App\Models\ProductSliderBulletImagesModel;
use App\Models\ProductsModel;

class ProductsController extends BaseController
{
    protected $categoryModel;
    protected $subcategoryModel;
    protected $sliderimagesModel;
    protected $sliderbulletimagesModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
        $this->subcategoryModel = new SubcategoryModel();
        $this->sliderimagesModel = new ProductSliderImagesModel();
        $this->sliderbulletimagesModel = new ProductSliderBulletImagesModel();
    }
    public function index()
    {
        $categories = $this->categoryModel->findAll();
        $subcategories = $this->subcategoryModel
            ->select('product_subcategories.*, product_categories.category_name')
            ->join('product_categories', 'product_subcategories.category_id = product_categories.category_id')
            ->findAll();
        $sliderimages = $this->sliderimagesModel->getAllImages();
        $sliderbulletimages = $this->sliderbulletimagesModel->getAllBulletImages();

        return view('products/index', [
            'categories' => $categories,
            'subcategories' => $subcategories,
            'sliderimages' => $sliderimages,
            'sliderbulletimages' => $sliderbulletimages
        ]);
    }

    public function details($slug)
    {
        $model = new ProductsModel();

        // Fetch product details by slug
        $product = $model->getProductBySlug($slug);

        if (!$product) {
            // If no product is found, show a 404 error
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Product not found");
        }

        // Pass product data to the view
        $data['product'] = $product;
        return view('products/details', $data);
    }
}
