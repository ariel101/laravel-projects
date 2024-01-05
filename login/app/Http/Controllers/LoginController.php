<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request){

        $input =  $request->all();
        $usuario = User::where('email', $input['email'])->first();
        if($usuario == null){

            return response()->json([
                'mensaje'=>'email invalido',
            ], 404);

        }

        if(Hash::check($request->password, $usuario->password)){

            $key = 'rer!@';
            $algorithm = 'HS256';
            $time = time();
            $payload = array(
                'iat' => $time, // Tiempo que inició el token
                'exp' => $time + 60*60, // Tiempo que expirará el token (+1 hora)
                'data' => [ // información del usuario
                'user' => $usuario,
                ],
            );
            $jwt = JWT::encode($payload, $key, $algorithm);
            return response()->json([
                    'authorization' => [
                    'token' => $jwt,
                    'type' => 'bearer',
                    'expires' => $time ,
                    ],
            ], 200);
            
        }
        else {
            return response()->json([
                'mensaje' => 'Contraseña invalida',
            ], 400);
        }
    }
}
