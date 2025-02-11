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
    protected $productsModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
        $this->subcategoryModel = new SubcategoryModel();
        $this->sliderimagesModel = new ProductSliderImagesModel();
        $this->sliderbulletimagesModel = new ProductSliderBulletImagesModel();
        $this->productsModel = new ProductsModel();
    }
    public function index()
    {
        // Fetch all categories
        $categories = $this->categoryModel->findAll();

        // Fetch products grouped by category
        $productsByCategory = [];
        foreach ($categories as $category) {
            $productsByCategory[$category['category_id']] = $this->productsModel
                ->select('products.*, product_subcategories.subcategory_name, product_categories.category_name')
                ->join('product_subcategories', 'products.subcategory_id = product_subcategories.subcategory_id')
                ->join('product_categories', 'product_subcategories.category_id = product_categories.category_id')
                ->where('product_categories.category_id', $category['category_id'])
                ->findAll();
        }

        // Fetch subcategories with their parent categories
        $subcategories = $this->subcategoryModel
            ->select('product_subcategories.*, product_categories.category_name')
            ->join('product_categories', 'product_subcategories.category_id = product_categories.category_id')
            ->findAll();

        // Fetch slider images and bullet images
        $sliderimages = $this->sliderimagesModel->getAllImages();
        $sliderbulletimages = $this->sliderbulletimagesModel->getAllBulletImages();

        // Pass data to the view
        return view('products/index', [
            'categories' => $categories,
            'subcategories' => $subcategories,
            'sliderimages' => $sliderimages,
            'sliderbulletimages' => $sliderbulletimages,
            'productsByCategory' => $productsByCategory,
        ]);
    }


    public function showAllByCategory($slug)
    {
        // Get category details by slug
        $category = $this->categoryModel
            ->where('slug', $slug)
            ->first();

        // Get subcategories by category slug
        $subcategories = $this->subcategoryModel
            ->select('product_subcategories.*, product_categories.category_name')
            ->join('product_categories', 'product_subcategories.category_id = product_categories.category_id')
            ->where('product_categories.slug', $slug)
            ->findAll();

        return view('products/showByCategory', [
            'subcategories' => $subcategories,
            'category_name' => $category ? $category['category_name'] : 'Category Not Found'
        ]);
    }

    public function showAllBySubcategory($slug)
    {
        // Get subcategory by slug
        $subcategory = $this->subcategoryModel->where('slug', $slug)->first();

        // If subcategory is found, get the products for that subcategory
        if ($subcategory) {

            // Get the main category using the category_id from the subcategory
            $mainCategory = $this->categoryModel->find($subcategory['category_id']);
            $products = $this->productsModel->getProductsBySubcategorySlug($slug);
            return view('products/showBySubcategory', [
                'products' => $products,
                'subcategory_name' => $subcategory['subcategory_name'],
                'main_category_name' => $mainCategory['category_name'],
                'main_category_slug' => $mainCategory['slug']
            ]);
        } else {
            // If no subcategory found, handle the error or redirect
            return redirect()->to('/supply/products')->with('error', 'Subcategory not found.');
        }
    }

    public function details($slug)
    {
        // Fetch product details by slug
        $product = $this->productsModel->getProductBySlug($slug);

        if (!$product) {
            // If no product is found, show a 404 error
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Product not found");
        }

        // Pass product data to the view
        $data['product'] = $product;
        return view('products/details', $data);
    }
}
