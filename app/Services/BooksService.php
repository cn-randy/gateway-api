<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;

class BooksService
{
    use ConsumeExternalService;

    /**
     * The base uri used to consume the books api
     *
     * @var string
     */
    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.books.base_uri');
    }
}
