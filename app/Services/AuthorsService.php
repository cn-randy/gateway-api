<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;

class AuthorsService
{
    use ConsumeExternalService;

    /**
     * The base uri used to consume the authors api
     *
     * @var string
     */
    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.authors.base_uri');
    }
}
