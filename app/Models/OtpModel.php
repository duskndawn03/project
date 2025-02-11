<?php 

namespace App\Models;

use CodeIgniter\Model;

class OtpModel extends Model
{
    protected $table = 'seller_otps';
    protected $primaryKey = 'id';
    protected $allowedFields = ['mobile_number', 'otp_code', 'expires_at', 'is_used', 'created_at'];

    public function saveOtp($mobile, $otp)
    {
        // Remove old OTP for the given mobile number
        $this->where('mobile_number', $mobile)->delete(); 

        return $this->insert([
            'mobile_number' => $mobile,
            'otp_code'      => $otp,
            'expires_at'    => date('Y-m-d H:i:s', strtotime('+5 minutes')),
            'is_used'       => 0, // Mark OTP as unused initially
            'created_at'    => date('Y-m-d H:i:s')
        ]);
    }

    public function validateOtp($mobile, $otp)
    {
        $otpData = $this->where([
            'mobile_number' => $mobile,
            'otp_code'      => $otp,
            'is_used'       => 0 // Ensure OTP is not already used
        ])->first();

        if ($otpData && strtotime($otpData['expires_at']) > time()) {
            // Mark OTP as used after successful validation
            $this->update($otpData['id'], ['is_used' => 1]);
            return true;
        }
        return false;
    }
}
