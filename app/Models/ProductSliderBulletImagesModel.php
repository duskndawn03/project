<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductSliderBulletImagesModel extends Model
{
    protected $table = 'product_sliderbulletimages';
    protected $primaryKey = 'photo_id';
    protected $allowedFields = ['photo_path', 'photo_title', 'created_at', 'slider_photo_id'];

    // Get all bullet images
    public function getAllBulletImages()
    {
        return $this->findAll();
    }

}
