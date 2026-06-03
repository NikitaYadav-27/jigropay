<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AuthApiController extends Controller
{
    /**
     * Send OTP to the given phone number.
     * Creates a new user if one doesn't exist.
     */
    public function sendOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|regex:/^[0-9]{10}$/',
        ]);

        $phone = $request->phone;

        $user = User::firstOrCreate(['phone' => $phone]);

        $otp = app()->environment('local', 'testing') ? '123456' : (string) random_int(100000, 999999);

        $user->otp = $otp;
        $user->otp_expires_at = now()->addMinutes(5);
        $user->save();


        return response()->json([
            'success' => true,
            'message' => 'OTP sent successfully',
        ]);
    }

    
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|regex:/^[0-9]{10}$/',
            'otp' => 'required|string|size:6',
        ]);

        $phone = $request->phone;
        $otp = $request->otp;

        $user = User::where('phone', $phone)->first();

        if (!$user || !$user->otp || $user->otp !== $otp || now()->greaterThan($user->otp_expires_at)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired OTP',
            ], 400);
        }

        $user->otp = null;
        $user->otp_expires_at = null;
        $user->save();

        
        
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'token' => $token,
                'user' => $user,
            ]);
        
    }
}
