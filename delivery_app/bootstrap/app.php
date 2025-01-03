<?php

use App\Http\Middleware\JwtMiddleware;
use App\Http\Middleware\PostJwtVerification;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful; 
use Illuminate\Routing\Middleware\ThrottleRequests;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )

    // ->withBroadcasting(
    //     __DIR__.'/../routes/channels.php',
    //     ['prefix' => 'api', 'middleware' => ['api', 'auth:sanctum']],
    // )
    

    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            \App\Http\Middleware\HandleInertiaRequests::class,
            \Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets::class,
        ]);

        $middleware->alias([
            'jwt.auth'=> JwtMiddleware::class,
            'post.jwt.verif' => PostJwtVerification::class
        ]);


        //Middleware para rutas API
        // $middleware->api(prepend: [
        //     \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        // ], append: [
        //     'throttle:api',
        //     \Illuminate\Routing\Middleware\SubstituteBindings::class,
        // ]);

        // Middleware para rutas API
        // $middleware->api(prepend: [
        //     EnsureFrontendRequestsAreStateful::class,
        // ], append: [
        //     ThrottleRequests::class . ':60,1', // Definir limitador de tasa aquí con 60 solicitudes por minuto
        //     SubstituteBindings::class,
        // ]);

        
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
