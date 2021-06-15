<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (AuthenticationException $e, $request) {
            return response()->json([
                'Flag' => 0,
                'Message' => $e->getMessage(),
                'Data' => null,
                'Errors' => array(
                    "Access denied" => 'You are not welcome here!'
                )
            ], 401);
        });

        $this->renderable(function (MethodNotAllowedException $e, $request) {
            return response()->json([
                'Flag' => 0,
                'Message' => $e->getMessage(),
                'Data' => null,
                'Errors' => array(
                    "Access denied" => 'You are not welcome here!'
                )
            ], 405);
        });

    }
}
