<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'product_categories';
    protected $primaryKey = 'category_id';
    protected $allowedFields = ['category_name', 'created_at'];
}
