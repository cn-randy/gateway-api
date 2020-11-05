<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser
{

    /**
     * Build success response
     *
     * @param   string/Array     $data  Data to be sent in response
     * @param   integer   $code  HTTP status code
     * @param   Response  HTTP response class
     * @param   HTTP_OK   success response code (200)
     *
     * @return  Illuminate\Http\Response
     */
    public function successResponse($data, $code = Response::HTTP_OK)
    {
        return response($data, $code)->header('Content-Type', 'application/json');
    }

    /**
     * Build error response
     *
     * @param   string/Array    $message  Data to be sent in response
     * @param   integer         $code  HTTP status code
     *
     * @return  Illuminate\Http\JsonResponse
     */
    public function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    /**
     * Response for errors generated in api service
     *
     * @param   string/Array    $message  Data to be sent in response
     * @param   integer         $code  HTTP status code
     *
     * @return  Illuminate\Http\Response
     */
    public function errorMessageResponse($message, $code)
    {
        return response($message, $code)->header('Content-Type', 'application/json');
    }
}
