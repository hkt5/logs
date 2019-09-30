<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    protected $dontReport = [];
    public function report(Exception $e)
    {
        parent::report($e);
    }
    public function render($request, Exception $e)
    {
        DB::rollback();

        //handle your different exceptions here
        return parent::render($request, $e);
    }
}
