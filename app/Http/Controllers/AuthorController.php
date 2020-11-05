<?php

namespace App\Http\Controllers;

use App\Services\AuthorsService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    use ApiResponser;

    /**
     * The service used to consume the authors api
     *
     * @var \App\Services\AuthorsSerce
     */
    public $authorsService;

    public function __construct(AuthorsService $authorsService)
    {
        $this->authorsService = $authorsService;        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->authorsService->getAuthors());
    }

    /**
     * Persist a newly created author using authors ai.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        return $this->successResponse($this->authorsService->createAuthor($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Fetch a single author from the authors api.
     *
     * @param  integer  $author     authotId
     * @return string               jsontepresentation of fetched author or error
     */
    public function show($author)
    {
        return $this->successResponse($this->authorsService->getAuthor($author));
    }

    /**
     * Update the specified author via the authors api.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $author     field<name => fieldValue for each field that has changed
     * @return string             jsonrepresentation of authos data or error
     */
    public function update(Request $request, $author)
    {
        return $this->successResponse($this->authorsService->editAuthor($request->all() ,$author));
    }

    /**
     * Remove the specified author using the authors api.
     *
     * @param  integer  $author     authorId
     * @return string               json representation of the author that was deleted
     */
    public function destroy($author)
    {
        return $this->successResponse($this->authorsService->deleteAuthor($author));
    }
}
