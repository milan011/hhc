<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        Illuminate\Database\QueryException::class,
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
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
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
        /*if($e instanceof ApiException) {
        $result = [
        "msg"    => "",
        "data"   => $e->getMessage(),
        "status" => 0
        ];
        return response()->json($result);
        }*/

        if ($exception instanceof \Illuminate\Database\QueryException) {
            $result = [
                "msg"    => "操作失败",
                "data"   => $exception->getMessage(),
                "status" => 0,
            ];

            return response()->json($result);
        }

        //如果路由中含有“api/”，则说明是一个 api 的接口请求
        /*if ($request->is("api/*")) {
        //如果错误是 ValidationException的一个实例，说明是一个验证的错误
        if ($exception instanceof ValidationException) {
        $result = [
        "code" => 422,
        //这里使用 $exception->errors() 得到验证的所有错误信息，是一个关联二维数组，所以                使用了array_values()取得了数组中的值，而值也是一个数组，所以用的两个 [0][0]
        "msg"  => array_values($exception->errors())[0][0],
        "data" => "",
        ];
        return response()->json($result);
        }
        }*/
        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param \Illuminate\Http\Request                 $request
     * @param \Illuminate\Auth\AuthenticationException $exception
     *
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => '请重新登录'], 401);
        }

        return redirect()->guest('login');
    }
}
