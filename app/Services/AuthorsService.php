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


    /**
     * Fetch all authors from authors api
     *
     * @return  string  json representation of author data or error
     */
    public function getAuthors()
    {
        return $this->performRequest('GET', '/authors');
    }

    public function createAuthor($data)
    {
        return $this->performRequest('POST', '/authors', $data);
    }

    /**
     * Fetch a single author by id
     *
     * @param  intger $authur  authorId
     * @return  string         json representation of author data or error
     */
    public function getAuthor($author)
    {
        return $this->performRequest('GET', "/authors/{$author}");
    }

    /**
     * Upate an instance of the author using the author aoi
     *
     * @param   array    $data    fieldName => fieldValue for each changed field
     * @param   integer  $author  authorId of author to be updated
     *
     * @return  string           json representation of the updated author
     */
    public function editAuthor($data, $author)
    {
        return $this->performRequest('PATCH', "/authors/{$author}", $data);
    }

    /**
     * Upate an instance of the author using the author aoi
     *
     * @param   integer  $author  authorId of author to be deleted
     *
     * @return  string           json representation of the deleted author
     */
    public function deleteAuthor($author)
    {
        return $this->performRequest('DELETE', "/authors/{$author}");
    }
}
