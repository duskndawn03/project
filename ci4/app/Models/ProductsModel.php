<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $allowedFields = ['product_name', 'product_category', 'product_image', 'current_price', 'created_at'];

    public function getProducts()
    {
        return $this->findAll();
    }
}
