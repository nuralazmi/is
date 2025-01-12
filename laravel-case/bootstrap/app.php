<?php

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Illuminate\Auth\Access\AuthorizationException;
use App\Http\Middleware\SetLocale;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(SetLocale::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Throwable $e) {
            if ($e instanceof AuthenticationException || $e instanceof AuthorizationException) {
                return response()->json([
                    'message' => trans('response.unauthorized'),
                ], ResponseAlias::HTTP_UNAUTHORIZED);
            }
            if ($e instanceof MethodNotAllowedHttpException || $e instanceof NotFoundHttpException) {
                return response()->json([
                    'message' => trans('response.not_found'),
                ], ResponseAlias::HTTP_NOT_FOUND);
            }
        });
    })->create();
