<?php

namespace App\Http\Controllers;

use App\Book;
use App\Services\AuthorsService;
use App\Services\BooksService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    use ApiResponser;

    /**
     * The service used to consume the books api
     *
     * @var \App\Services\BookhService
     */
    public $booksService;

    /**
     * The service used to consume the authors api
     *
     * @var \App\Services\AuthorsService
     */
    public $authorsService;

    public function __construct(BooksService $booksService, AuthorsService $authorsService)
    {
        $this->booksService = $booksService;        
        $this->authorsService = $authorsService;        
    }

    /**
     * Display a listing of all books.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->booksService->getBooks());
    }

    /**
     * Store a newly created book in thedatabase.
     * 
     * Before a new book can been stored we need to  make sure that the author exists. 
     * We can do this by sending a request to the authors api passing the author id
     * recieved $request. An error is thrown if the author is not found.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorsService->getAuthor($request->author_id);

        // author was found
        return $this->successResponse($this->booksService->createBook($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Display the specified book.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($book)
    {
        return $this->successResponse($this->booksService->getBook($book));
    }

    /**
     * Update the specified book via the books api.
     *
     * Before a book can been updated we need to  make sure that the author_id was modified and
     * the author exists. We can do this by sending a request to the authors api passing the 
     * author id recieved $request. The authors service will throw an error if the author 
     * is not found.

     * @param  \Illuminate\Http\Request  $request
     * @param  array    $book     field<name => fieldValue for each field that has changed
     * @param  integer  $book     field<name => fieldValue for each field that has changed
     * @return string             json representation of updated book data or error
     */
    public function update(Request $request, $book)
    {
        if (in_array('author_id', array_keys($request->all()))) {
            $this->authorsService->getAuthor($request->author_id);
        }

        return $this->successResponse($this->booksService->editBook($request->all() ,$book));
    }

    /**
     * Remove the specified book using the bookks api.
     *
     * @param  integer  $book       bookId
     * @return string               json representation of the book that was deleted
     */
    public function destroy($book)
    {
        return $this->successResponse($this->booksService->deleteBook($book));
    }
}
