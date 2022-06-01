<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendOtpRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function sendOtp(SendOtpRequest $request) 
    {
        $otp_expires_time = Carbon::now()->addSeconds(60);

        $otp = rand(1000,9999);
		Log::info("Greenfones otp to login =".$otp);
		// $user = User::firstOrCreate([
		// 	'phone_number' => $request->phoneNumber()
		// ]);

        $user = User::where('phone_number', $request->phoneNumber())->first();

        if ($user !== null) {
            $user->otp = $otp;
            $user->otp_expires_time = $otp_expires_time; 
            $user->save();
        } 
        
        else {
            $user = new User();
            $user->phone_number = $request->phoneNumber();
            $user->otp = $otp;
            $user->otp_expires_time = $otp_expires_time; 
            $user->save();
        }
		
		return response()->json(['success' => true,'message' => $user], 200);
    }
}
