<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductSliderImagesModel extends Model
{
    protected $table = 'product_sliderimages';
    protected $primaryKey = 'photo_id';
    protected $allowedFields = ['photo_path', 'photo_title', 'created_at'];

    // Get all images
    public function getAllImages()
    {
        return $this->findAll();
    }
}
