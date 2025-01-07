<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $allowedFields = ['product_name', 'product_slug', 'product_price', 'product_image', 'subcategory_id'];

    // Get all products
    public function getAllProducts()
    {
        return $this->findAll();
    }

    // Get product by id
    public function getProductById($id)
    {
        return $this->find($id);
    }

    // Insert new product
    public function addProduct($data)
    {
        return $this->insert($data);
    }

    // Update existing product
    public function updateProduct($id, $data)
    {
        return $this->update($id, $data);
    }

    // Delete product by id
    public function deleteProduct($id)
    {
        return $this->delete($id);
    }
}
