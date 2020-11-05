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

    /**
     * Fetch all books from books api
     *
     * @return  string  json representation of books data or error
     */
    public function getBooks()
    {
        return $this->performRequest('GET', '/books');
    }

    /**
     * [createBook description]
     *
     * @param   array  $data  Fields => data that is to be persisted
     *
     * @return  string        json string representation of new book data or error
     */
    public function createBook($data)
    {
        return $this->performRequest('POST', '/books', $data);
    }

    /**
     * Show a single book
     *
     * @param  intger $$book  bookId
     * @return  string        json representation of book data or error
     */
    public function getBook($book)
    {
        return $this->performRequest('GET', "/books/{$book}");
    }

    /**
     * Upate an instance of the book using the books aoi
     *
     * @param   array    $data    fieldName => fieldValue for each changed field
     * @param   integer  $book    bookId of book to be updated
     *
     * @return  string           json representation of the updated book or error
     */
    public function editBook($data, $book)
    {
        return $this->performRequest('PATCH', "/books/{$book}", $data);
    }

    /**
     * Upate an instance of the book using the book api
     *
     * @param   integer  $book   bookId of book to be deleted
     *
     * @return  string           json representation of the deleted book
     */
    public function deleteBook($book)
    {
        return $this->performRequest('DELETE', "/books/{$book}");
    }

}
