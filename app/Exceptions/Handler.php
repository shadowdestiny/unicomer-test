<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;

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
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {

        if ($this->isHttpException($exception)) {

            switch ($exception->getStatusCode()) {
                case '400': return response()->view("dashboard.templates.error.400", [], 404);
                case '403': return response()->view("dashboard.templates.error.403", [], 404);
                case '404': return response()->view("dashboard.templates.error.404", [], 404);
                case '500': return response()->view("dashboard.templates.error.500", [], 404);
                case '503': return response()->view("dashboard.templates.error.503", [], 404);
            }

        }

        return parent::render($request, $exception);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        $guard = array_get($exception->guards(), 0);

        switch ($guard) {
            case 'admin':
                return redirect()->route('dashboard.admin.login');
                break;
            default:
                return redirect()->route('dashboard.customer.login');
                break;
        }   
    }
}
