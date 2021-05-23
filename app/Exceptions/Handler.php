<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\QueryException;

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
        $this->renderable(function (AccessDeniedHttpException $e, $request) {
            return response()->json([
                'status' => false,
                'message' => 'The user is not authorized.',
            ]);
        });

        $this->renderable(function (NotFoundHttpException $e, $request) {
            return response()->json([
                'status' => false,
                'message' => 'The page or model is not found.',
            ]);
        });

        // $this->renderable(function (QueryException $e, $request) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'A',
        //     ]);
        // });
    }
}
