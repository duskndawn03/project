<?php

namespace App\Models;

use CodeIgniter\Model;

class SubcategoryModel extends Model
{
    protected $table = 'product_subcategories';
    protected $primaryKey = 'subcategory_id';
    protected $allowedFields = ['subcategory_name', 'slug', 'category_id', 'created_at'];
}
