<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JWTmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            
            $autorizacion = $request->header('Authorization'); //obtenemos el token de la cabecera
            $jwt = substr($autorizacion, 7); //eliminamos el prefijo Bearer del token
            $key = 'asdasd2##!!'; //llave para desencriptar el token
            
            $datos = JWT::decode($jwt,  new Key($key, 'HS256')); //decodificamos el token con la llave y el algoritmo HS256
           
            $request->attributes->add(['usuario' => $datos->data]); //agregamos el usuario decodificado a los atributos del request para poder acceder a el en el controlador
           
        }
        catch (\Exception $e) {

            return response()->json(['status' => 'No autorizado'.$e->getMessage()], 401);   
            
        } 
        return $next($request);
    }
}
