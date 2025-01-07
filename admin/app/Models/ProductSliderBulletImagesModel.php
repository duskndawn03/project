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

    // Get bullet image by slider photo ID
    public function getBulletBySliderPhotoId($sliderPhotoId)
    {
        return $this->where('slider_photo_id', $sliderPhotoId)->first();
    }

    // Add a new bullet image
    public function addBulletImage($data)
    {
        return $this->insert($data);
    }

    // Delete a bullet image by ID
    public function deleteBulletImage($id)
    {
        return $this->delete($id);
    }

    // Delete a bullet image by slider photo ID
    public function deleteBulletBySliderPhotoId($sliderPhotoId)
    {
        return $this->where('slider_photo_id', $sliderPhotoId)->delete();
    }
}
