<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class GeneralJsonException extends Exception
{
    //
    protected $code = 422;
    /**
     * Report the exception.
     */

    public function report()
    {
        //
    }

    /**
     * Render the exception as an HTTP response.
     * 
     * @param  \Illuminate\Http\Request $request
     */

    public function reander($request)
    {

        return new JsonResponse([

            'errors' => ['message' => $this->getMessage()]
        ], $this->code);
    }
}