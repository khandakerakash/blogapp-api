<?php
/**
 * Created by PhpStorm.
 * User: tapos
 * Date: 9/1/2018
 * Time: 12:45 PM
 */

namespace App\Exceptions;


use App\Traits\ApiResponse;
use Exception;

class AppErrorException extends Exception
{
    use ApiResponse;
    public function report()
    {
        //
    }
    public function render($request)
    {
        if (!$request->is('api/*')) {
            return back()->withErrors($this->getMessage());
        }
    }
}
