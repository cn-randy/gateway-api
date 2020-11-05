<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class NoEditsMadeException extends Exception
{
    public function __construct($objectName = '' ) {

        $message = $objectName ? "No modifications were made to {$objectName}. Please edit the record and try again." : "No modifications were made. Please edit the record and try again.";

        return parent::__construct($message, Response::HTTP_UNPROCESSABLE_ENTITY);

    }
}
