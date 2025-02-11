<?php 

namespace App\Models;

use CodeIgniter\Model;

class SellerModel extends Model
{
    protected $table = 'sellers';
    protected $primaryKey = 'seller_id';
    protected $allowedFields = ['mobile_number', 'email', 'password', 'store_name', 'is_verified', 'status', 'created_at'];

    public function checkMobileExists($mobile)
    {
        return $this->where('mobile_number', $mobile)->first();
    }

    public function createSeller($data)
    {
        return $this->insert($data);
    }

    public function verifySeller($mobile)
    {
        return $this->where('mobile_number', $mobile)->set('is_verified', 1)->update();
    }
}
