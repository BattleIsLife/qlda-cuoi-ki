<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: [
            __DIR__.'/../routes/web.php',
            __DIR__.'/../routes/auth.php',
            __DIR__.'/../routes/author.php',
            __DIR__.'/../routes/moderator.php',
            __DIR__.'/../routes/contents.php',
            __DIR__.'/../routes/interactions.php',
        ],
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
        $middleware->alias([
            'check.user.login' => \App\Http\Middleware\AuthenticateUser::class,
            'check.user.guest' => \App\Http\Middleware\CheckUserGuest::class,
            'check.moderator.login' => App\Http\Middleware\AuthenticateModerator::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
