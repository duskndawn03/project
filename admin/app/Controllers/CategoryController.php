<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\SubcategoryModel;

class CategoryController extends BaseController
{
    protected $categoryModel;
    protected $subcategoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
        $this->subcategoryModel = new SubcategoryModel();
    }

    // View Categories and Subcategories
    public function index()
    {
        $categories = $this->categoryModel->findAll();
        $subcategories = $this->subcategoryModel
            ->select('product_subcategories.*, product_categories.category_name')
            ->join('product_categories', 'product_subcategories.category_id = product_categories.category_id')
            ->findAll();

        return view('categories', [
            'categories' => $categories,
            'subcategories' => $subcategories
        ]);
    }

    // Insert Category
    public function createCategory()
    {
        $this->categoryModel->insert([
            'category_name' => $this->request->getPost('category_name'),
        ]);

        return redirect()->to('/categories')->with('success', 'Category added successfully!');
    }

    // Update Category
    public function updateCategory($id)
    {
        $this->categoryModel->update($id, [
            'category_name' => $this->request->getPost('category_name'),
        ]);

        return redirect()->to('/categories')->with('success', 'Category updated successfully!');
    }

    // Delete Category
    public function deleteCategory($id)
    {
        $this->categoryModel->delete($id);
        return redirect()->to('/categories')->with('success', 'Category deleted successfully!');
    }

    // Insert Subcategory
    public function createSubcategory()
    {
        $this->subcategoryModel->insert([
            'subcategory_name' => $this->request->getPost('subcategory_name'),
            'category_id' => $this->request->getPost('category_id'),
        ]);

        return redirect()->to('/categories')->with('success', 'Subcategory added successfully!');
    }

    // Update Subcategory
    public function updateSubcategory($id)
    {
        $this->subcategoryModel->update($id, [
            'subcategory_name' => $this->request->getPost('subcategory_name'),
            'category_id' => $this->request->getPost('category_id'),
        ]);

        return redirect()->to('/categories')->with('success', 'Subcategory updated successfully!');
    }

    // Delete Subcategory
    public function deleteSubcategory($id)
    {
        $this->subcategoryModel->delete($id);
        return redirect()->to('/categories')->with('success', 'Subcategory deleted successfully!');
    }
}
