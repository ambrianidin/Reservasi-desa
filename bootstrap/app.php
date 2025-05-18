<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\App;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'PelangganAkses' => \App\Http\Middleware\PelangganAkses::class,
            'guests' => \App\Http\Middleware\RedirectIfAuthenticated::class,
            'UserAkses' => \App\Http\Middleware\UserAkses::class,
        ]
        );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();



