<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\JWTException;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {

            // Log básico para verificar que el middleware se está ejecutando 
            Log::info('Middleware JWT ejecutado.');
            Log::info('Encabezado de autorización: ', ['Authorization' => $request->header('Authorization')]);
            // Intenta autenticar al usuario con el token presente
            $user = JWTAuth::parseToken()->authenticate();
            if (!$user) {
                // Si el usuario no se encuentra, retorna un error 404
                return response()->json(['error' => 'User not found o usuario no encontrado'], 404);
            }
        } catch (TokenExpiredException $e) {
            return response()->json(['error' => 'El token a expirado por favor inicia sesion nuevamente'], 401);
        } catch (TokenInvalidException $e) {
            return response()->json(['error' => 'Token invalid'], 401);
        } catch (JWTException $e) {
            return response()->json(['error' => 'Token not provided'], 401);
        }

        // Si el usuario es válido, continúa con la solicitud
        return $next($request);
    }
}
