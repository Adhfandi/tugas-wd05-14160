<?php

<<<<<<< HEAD
use App\Http\Middleware\RoleMiddleware;
=======
use App\Http\Middleware\RoledMiddleware;
>>>>>>> e7e5b0519c966654fddd06263bc881dc9ebe0be2
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
<<<<<<< HEAD
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
=======
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
>>>>>>> e7e5b0519c966654fddd06263bc881dc9ebe0be2
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
<<<<<<< HEAD
            'role' => RoleMiddleware::class
=======
            'role' => RoledMiddleware::class
>>>>>>> e7e5b0519c966654fddd06263bc881dc9ebe0be2
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
