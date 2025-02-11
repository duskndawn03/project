<?php 

namespace App\Controllers;

use App\Models\SellerModel;
use App\Models\OtpModel;
use CodeIgniter\Controller;
use Twilio\Rest\Client;
use App\Config\Twilio;

class SellerController extends BaseController
{
    public function step1()
    {
        return view('products/seller/register_step1');
    }

    public function sendOtp()
    {
        $mobile = $this->request->getPost('mobile_number');
        $sellerModel = new SellerModel();
        $otpModel = new OtpModel();

        // Check if mobile already exists
        if ($sellerModel->checkMobileExists($mobile)) {
            return redirect()->back()->with('error', 'Mobile number already registered.');
        }

        // Generate OTP
        $otp = rand(100000, 999999);
        $otpModel->saveOtp($mobile, $otp);

        // Send OTP via Twilio
        $this->sendSmsOtp($mobile, $otp);

        return redirect()->to('/seller/verify-otp')->with('success', 'OTP sent to your mobile.');
    }

    private function sendSmsOtp($mobile, $otp)
    {
        $twilioConfig['sid']    = getenv('TWILIO_SID');
        $twilioConfig['token']  = getenv('TWILIO_AUTH_TOKEN');
        $twilioConfig['from']   = getenv('TWILIO_PHONE_NUMBER');
      
        $client = new Client($twilioConfig['sid'], $twilioConfig['token']);

        $message = "Your OTP code is $otp. It is valid for 5 minutes.";

        $client->messages->create(
            "+$mobile",
            [
                'from' => $twilioConfig['from'],
                'body' => $message
            ]
        );
    }

    public function verifyOtp()
    {
        return view('seller/verify_otp');
    }

    public function checkOtp()
    {
        $mobile = $this->request->getPost('mobile_number');
        $otp = $this->request->getPost('otp');
        $otpModel = new OtpModel();

        if ($otpModel->validateOtp($mobile, $otp)) {
            session()->set('mobile_number', $mobile);
            return redirect()->to('/seller/register-step2')->with('success', 'OTP verified. Continue registration.');
        } else {
            return redirect()->back()->with('error', 'Invalid OTP or expired.');
        }
    }

    public function step2()
    {
        return view('seller/register_step2');
    }

    public function register()
    {
        $sellerModel = new SellerModel();

        $data = [
            'mobile_number' => session('mobile_number'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'store_name' => $this->request->getPost('store_name'),
            'is_verified' => 1,
            'status' => 'pending'
        ];

        if ($sellerModel->createSeller($data)) {
            return redirect()->to('/seller/login')->with('success', 'Registration successful! Awaiting admin approval.');
        } else {
            return redirect()->back()->with('error', 'Registration failed.');
        }
    }
}
