<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\SubcategoryModel;
use App\Models\ProductSliderImagesModel;
use App\Models\ProductSliderBulletImagesModel;
use App\Models\ProductModel;

class ProductController extends BaseController
{
    protected $categoryModel;
    protected $subcategoryModel;
    protected $sliderModel;
    protected $sliderbulletModel;
    protected $productModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
        $this->subcategoryModel = new SubcategoryModel();
        $this->sliderModel = new ProductSliderImagesModel();
        $this->sliderbulletModel = new ProductSliderBulletImagesModel();
        $this->productModel = new ProductModel();
    }

    // View Categories and Subcategories
    public function index()
    {
        $categories = $this->categoryModel->findAll();
        $subcategories = $this->subcategoryModel
            ->select('product_subcategories.*, product_categories.category_name')
            ->join('product_categories', 'product_subcategories.category_id = product_categories.category_id')
            ->findAll();
        $products = $this->productModel->findAll();
        $data['photos'] = $this->sliderModel->getAllImages();
        $data['bullet_photos'] = $this->sliderbulletModel->getAllBulletImages();

        return view('products', [
            'categories' => $categories,
            'subcategories' => $subcategories,
            'products' => $products,
            'photos' => $data['photos'],
            'bullet_photos' => $data['bullet_photos']
        ]);
    }

    // Insert Category
    public function createCategory()
    {
        $this->categoryModel->insert([
            'category_name' => $this->request->getPost('category_name'),
        ]);

        return redirect()->to('/products')->with('success', 'Category added successfully!');
    }

    // Update Category
    public function updateCategory($id)
    {
        $this->categoryModel->update($id, [
            'category_name' => $this->request->getPost('category_name'),
        ]);

        return redirect()->to('/products')->with('success', 'Category updated successfully!');
    }

    // Delete Category
    public function deleteCategory($id)
    {
        $this->categoryModel->delete($id);
        return redirect()->to('/products')->with('success', 'Category deleted successfully!');
    }

    // Insert Subcategory
    public function createSubcategory()
    {
        $subcategoryName = $this->request->getPost('subcategory_name');
        $categoryId = $this->request->getPost('category_id');

        // Remove apostrophes and other special characters
        $cleanName = preg_replace("/[^a-zA-Z0-9\s-]/", '', $subcategoryName);

        // Temporarily insert the subcategory to generate ID
        $this->subcategoryModel->insert([
            'subcategory_name' => $subcategoryName,
            'category_id' => $categoryId,
        ]);

        // Get the inserted subcategory ID
        $subcategoryId = $this->subcategoryModel->insertID();

        // Generate slug
        $slug = url_title($cleanName, '-', true) . '-' . $subcategoryId;

        // Update the slug in the same insert operation
        $this->subcategoryModel->update($subcategoryId, [
            'slug' => $slug,
        ]);

        return redirect()->to('/products')->with('success', 'Subcategory added successfully!');
    }


    // Update Subcategory
    public function updateSubcategory($id)
    {
        $this->subcategoryModel->update($id, [
            'subcategory_name' => $this->request->getPost('subcategory_name'),
            'category_id' => $this->request->getPost('category_id'),
        ]);

        return redirect()->to('/products')->with('success', 'Subcategory updated successfully!');
    }

    // Delete Subcategory
    public function deleteSubcategory($id)
    {
        $this->subcategoryModel->delete($id);
        return redirect()->to('/products')->with('success', 'Subcategory deleted successfully!');
    }


    // Add Product
    public function createProduct()
    {
        $this->productModel->addProduct([
            'product_name' => $this->request->getPost('product_name'),
            'product_slug' => $this->request->getPost('product_slug'),
            'current_price' => $this->request->getPost('product_price'),
            'subcategory_id' => $this->request->getPost('subcategory_id'),
            'product_image' => $this->request->getPost('product_image'), // image URL or path
        ]);

        return redirect()->to('/products')->with('success', 'Product added successfully!');
    }

    // Edit Product
    public function editProduct($id)
    {
        $product = $this->productModel->getProductById($id);
        $categories = $this->categoryModel->findAll();
        $subcategories = $this->subcategoryModel->where('category_id', $product['category_id'])->findAll();

        return view('edit_product', [
            'product' => $product,
            'categories' => $categories,
            'subcategories' => $subcategories
        ]);
    }

    // Update Product
    public function updateProduct($id)
    {
        $this->productModel->updateProduct($id, [
            'product_name' => $this->request->getPost('product_name'),
            'product_slug' => $this->request->getPost('product_slug'),
            'product_price' => $this->request->getPost('product_price'),
            'subcategory_id' => $this->request->getPost('subcategory_id'),
            'product_image' => $this->request->getPost('product_image'), // image URL or path
        ]);

        return redirect()->to('/products')->with('success', 'Product updated successfully!');
    }

    // Delete Product
    public function deleteProduct($id)
    {
        $this->productModel->deleteProduct($id);
        return redirect()->to('/products')->with('success', 'Product deleted successfully!');
    }

    // Handle Slider image upload
    public function uploadSliderAndBulletPhoto()
    {
        // Handle Slider Photo
        $sliderFile = $this->request->getFile('slider_photo');
        $sliderTitle = $this->request->getPost('slider_photo_title');

        if ($sliderFile->isValid() && !$sliderFile->hasMoved()) {
            $sliderFileName = $sliderFile->getRandomName();
            $sliderFilePath = '../uploads/products/sliderimages/' . $sliderFileName;
            $sliderFile->move('../uploads/products/sliderimages/', $sliderFileName);

            // Add Slider Photo to the database
            $sliderPhotoId = $this->sliderModel->addImage([
                'photo_path' => $sliderFilePath,
                'photo_title' => $sliderTitle
            ]);

            // Handle Bullet Photo
            $bulletFile = $this->request->getFile('bullet_photo');
            $bulletTitle = $this->request->getPost('bullet_photo_title');

            if ($bulletFile->isValid() && !$bulletFile->hasMoved()) {
                $bulletFileName = $bulletFile->getRandomName();
                $bulletFilePath = '../uploads/products/sliderimages/bullets/' . $bulletFileName;
                $bulletFile->move('../uploads/products/sliderimages/bullets/', $bulletFileName);

                // Add Bullet Photo to the database with foreign key reference
                $this->sliderbulletModel->addBulletImage([
                    'photo_path' => $bulletFilePath,
                    'photo_title' => $bulletTitle,
                    'slider_photo_id' => $sliderPhotoId
                ]);

                return redirect()->to('/products')->with('success', 'Photos uploaded successfully.');
            }
        }

        return redirect()->to('/products')->with('error', 'Failed to upload photos.');
    }



    // Handle slider and associated bullet photo deletion
    public function deleteSliderPhoto($id)
    {
        // Find the slider photo
        $photo = $this->sliderModel->find($id);

        if ($photo) {
            // Delete the slider photo file from the server
            if (file_exists($photo['photo_path'])) {
                unlink($photo['photo_path']);
            }

            // Find and delete the associated bullet photo
            $bulletPhoto = $this->sliderbulletModel->where('slider_photo_id', $id)->first();

            if ($bulletPhoto) {
                // Delete the bullet photo file from the server
                if (file_exists($bulletPhoto['photo_path'])) {
                    unlink($bulletPhoto['photo_path']);
                }

                // Delete the bullet photo record from the database
                $this->sliderbulletModel->delete($bulletPhoto['photo_id']);
            }

            // Delete the slider photo record from the database
            $this->sliderModel->deleteImage($id);

            return redirect()->to('/products')->with('success', 'Slider and associated bullet photo deleted successfully.');
        }

        return redirect()->to('/products')->with('error', 'Slider photo not found.');
    }
}
