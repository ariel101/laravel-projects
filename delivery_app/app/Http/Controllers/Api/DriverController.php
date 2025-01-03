<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email','password');
        try {
            if(!$token = Auth::guard('drivers')->attempt($credentials)){
                return response()->json(['error' => 'token invalido'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['message'=>$e]);
        }
        $user = auth()->guard('drivers')->user();

        return response()->json(['Conductor:'=>$user, 'token'=>$token]);
    }
}
