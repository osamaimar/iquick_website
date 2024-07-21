<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
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
        $this->renderable(function (NotFoundHttpException $e,$request) {
            if($request->wantsJson() || $request->is('api/*')){
              return response()->json(['data'=>'','message'=>'fail','code'=>404,'error'=>'page not found']);
            }
        });

        $this->renderable(function (MethodNotAllowedHttpException $e,$request) {
            if($request->wantsJson() || $request->is('api/*')){
              return response()->json(['data'=>'','message'=>'fail','code'=>405,'error'=>'Method Not Allowed']);
            }
        });

        $this->renderable(function (ModelNotFoundException $e, $request) {
            if ($request->wantsJson() || $request->is('api/*')) {
                return response()->json(['data'=>'','message'=>'fail','code'=>404,'error'=>'Item Not Found']);
            }
        });

        $this->renderable(function (AuthenticationException $e, $request) {
            if ($request->wantsJson() || $request->is('api/*')) {
                return response()->json(['data'=>'','message'=>'fail','code'=>401,'error'=>'UnAuthenticated']);
            }
        });

        $this->renderable(function (QueryException $e, $request) {
            if ($request->wantsJson() || $request->is('api/*')) {
                return response()->json(['data'=>'','message'=>'fail','code'=>401,'error'=>'Query error']);
            }
        });
    }
}
