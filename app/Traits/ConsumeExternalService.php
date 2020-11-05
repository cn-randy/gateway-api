<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumeExternalService
{
    public $baseUri;

    /**
     * Sends request to api
     *
     * @param   string  $method      Http method (GET, POST, PATCH etc)
     * @param   string  $requestUrl  Api endpoinr
     * @param   array   $formParams  Data required by api endpoint
     * @param   array   $headers     Headers required by api endpoint
     *
     * @return  string               json string containing data fetched from spi
     */
    public function performRequest($method, $requestUrl, $formParams = [], $headers = [])
    {
        $client = new Client(['base_uri' => $this->baseUri]);

        $response = $client->request($method, $requestUrl, [
            'form_params' => $formParams,
            'headers' => $headers,
        ]);

        return $response->getBody()->getContents();
    }
}
