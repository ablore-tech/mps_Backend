<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginWithOtpRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginWithOtp(LoginWithOtpRequest $request)
    {
        $user = User::where([
			['phone_number', '=', $request->phoneNumber()],
			['otp', '=', $request->otp()]
		])->first();

        if($user) 
        {
            if($user->otp_expires_time >= Carbon::now())
            {
                Auth::login($user, true);
                
                $token = $user->createToken($request->input('device_name'))->plainTextToken;
                return response()->json([
                    'token' => $token,
                    'token_type' => 'Bearer'
                ]);
            }
            return response()->json('Otp is expired', 422);
        }
		return response()->json(['success' => true,'message' => 'Otp is not verified successfully'], 201);
    } 
}
