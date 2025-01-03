<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class ClientController extends Controller
{
    public function register(Request $request)
    {
        // Validar los datos del cliente
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients,email',
            'password' => 'required|string|min:8|confirmed', // password_confirmation
            'phone_number' => 'required|string|max:20', // Puedes ajustar la longitud máxima según sea necesario
            'address' => 'required|string|max:255',
        ]);

        // Crear el nuevo cliente
        $client = Client::create([
            'name' => $validated['name'],
            'lastname' => $validated['lastname'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone_number' => $validated['phone_number'],
            'address' => $validated['address'],
        ]);

        // Generar un token para el cliente recién registrado
        $token = JWTAuth::fromUser($client);

        return response()->json([
            'message' => 'Client registered successfully.',
            'client' => $client,
            'token' => $token,
        ], 201);
    }


    public function login(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);

        $credentials = $request->only('email','password');
        try {
            if (! $token = Auth::guard('clients')->attempt($credentials)) {
                return response()->json(['error' => 'token invalido'], 401);
            }
            
        } catch (JWTException $e) {
            return response()->json(['messagge' => 'error al intentar crear el token']);
        }

        
        return response()->json(['token' => $token]);
    }

    public function logout(){
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['message' => 'toke invalidado con exito']);
    }

    public function profile(){

        $user = auth()->guard('clients')->user(); 
        if (!$user) { 
            return response()->json(['messages' => 'User not found o usuario vacio'], 404); 
        } 
        return response()->json([ 'success' => true, 'usuario' => $user ]);
    }
}
