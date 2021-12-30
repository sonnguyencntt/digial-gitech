<?php

namespace App\Exceptions;

use Exception;

class UserException extends Exception
{
    protected $exception;
    protected $error_List;

    public function __construct($exception, ...$error_List)
    {
        $this->exception = $exception;
        $this->error_List = $error_List;
    }

    public function report()
    {
        // \Log::channel('myex')->info('User not found');
    }

    public function render()
    {
        $this->exceptionWeb();
    }

    public function exceptionWeb()
    {
        if ($this->exception instanceof \Illuminate\Validation\ValidationException) 
        {
            
        }
    }
    
    public function exceptionApi()
    {
    }
}
