<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $allowedFields = ['product_name', 'product_slug', 'subcategory_id', 'product_image_path', 'current_price', 'created_at', 'product_description', 'product_image_title'];

    public function getProducts()
    {
        return $this->findAll();
    }

    // Define the relationship with the product_subcategories table
    public function getProductsBySubcategorySlug($slug)
    {
        return $this->select('products.*')
                    ->join('product_subcategories', 'product_subcategories.subcategory_id = products.subcategory_id')
                    ->where('product_subcategories.slug', $slug)
                    ->findAll();
    }
    
    public function getProductBySlug($slug)
    {
        $slug = urldecode($slug);
        $db = \Config\Database::connect();
        $builder = $db->table('products');
        $builder->where('product_slug', $slug);
        return $builder->get()->getRowArray();
    }
}
