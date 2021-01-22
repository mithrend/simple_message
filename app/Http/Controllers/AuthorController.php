<?php

namespace App\Http\Controllers;

use App\Author;
use App\Http\Requests\AuthorStoreRequest;
use App\Http\Requests\AuthorUpdateRequest;
use App\Http\Resources\AuthorResource;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Class AuthorController
 * @package App\Http\Controllers
 */
class AuthorController extends Controller
{
    /**
     * Display a list of authors.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return new JsonResponse(AuthorResource::collection(Author::all()));
    }

    /**
     * Store an author in the database.
     *
     * @param AuthorStoreRequest $request
     * @return JsonResponse
     */
    public function store(AuthorStoreRequest $request): JsonResponse
    {
        $author = Author::create($request->toArray());

        return new JsonResponse(new AuthorResource($author));
    }

    /**
     * Get a specific author.
     *
     * @param Author $author
     * @return JsonResponse
     */
    public function show(Author $author): JsonResponse
    {
        return new JsonResponse(new AuthorResource($author));
    }

    /**
     * Update the authors data in the database.
     *
     * @param AuthorUpdateRequest $request
     * @param Author $author
     * @return JsonResponse
     */
    public function update(AuthorUpdateRequest $request, Author $author): JsonResponse
    {
        $author->update($request->all());

        return new JsonResponse(null, 204);
    }

    /**
     * Remove the author from the database.
     *
     * @param Author $author
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Author $author): JsonResponse
    {
        try {
            $author->delete();
        } catch (Exception $exception) {
            return  new JsonResponse($exception->getMessage(), 500);
        }
        return new JsonResponse(null, 204);
    }
}
