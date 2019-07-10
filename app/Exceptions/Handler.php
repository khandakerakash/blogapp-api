<?php

namespace App\Exceptions;

use App\Traits\ApiResponse;
use Exception;
use HttpException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Exception\NotWritableException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    use ApiResponse;
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





    public function render($request, Exception $exception)
    {
        if(config('app.debug')  ){
            parent::render($request, $exception);
        }

        if (!$request->is('api/*')) {
            return parent::render($request, $exception);
        }else{

            if($exception instanceof ValidationException){

                return  $this->apiValidation($exception,$request);
            }
            if($exception instanceof ModelNotFoundException){
                $modelName = strtolower(class_basename($exception->getModel()));
                return  $this->errorResponse("Doest not exits any {$modelName} with the specified identifier",404);
            }
            if($exception instanceof AuthenticationException){
                return  $this->unauthenticated($request,$exception);
            }
            if($exception instanceof AuthorizationException){
                return  $this->errorResponse($exception->getMessage(),403);
            }
            if($exception instanceof NotFoundHttpException){
                return  $this->errorResponse("The specified URL cannot found",404);
            }
            if($exception instanceof MethodNotAllowedHttpException){
                return  $this->errorResponse("The specified method cannot found",404);
            }
            if($exception instanceof HttpException){
                return  $this->errorResponse($exception->getMessage(),404);
            }
            if($exception instanceof QueryException){
                $errorCode = $exception->errorInfo[1];
                if($errorCode==1451){
                    return $this->errorResponse("Can not remove this resource permanently. It is related
                with any other resource",403);
                }
            }
            if($exception instanceof  TokenMismatchException){
                return redirect()->back()->withInput($request->input());
            }

            if($exception instanceof AppErrorException){
                return  $this->errorResponse($exception->getMessage(),404);
            }

            if($exception instanceof UserErrorException){
                return  $this->errorResponse($exception->getMessage(),455);
            }

            if($exception instanceof NotWritableException){
                return  $this->errorResponse($exception->getMessage(),404);
            }

            if($exception instanceof \Spatie\Permission\Exceptions\UnauthorizedException){
                return  $this->errorResponse($exception->getMessage(),404);
            }

//            if($exception instanceof  MissingParameterException){
//                return  $this->errorResponse($exception->getMessage(),404);
//            }

            if(config('app.debug')){
                return parent::render($request, $exception);
            }

            Log::error($exception->getTraceAsString());
            return $this->errorResponse('Unexpected Exception. Try later',500);
        }

    }



    public function apiValidation(ValidationException $e, $request)
    {
        $errors = $e->validator->errors()->getMessages();


        return $this->errorResponse($errors, 422);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->is('api/*')) {
            return $this->errorResponse("Unauthenticated", 401);
        }
        return redirect()->guest('login');

    }
}
