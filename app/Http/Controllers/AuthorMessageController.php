<?php

namespace App\Http\Controllers;

use App\Author;
use App\Message;
use App\Http\Requests\MessageStoreRequest;
use App\Http\Resources\MessageResource;
use Illuminate\Http\JsonResponse;

/**
 * Class AuthorMessageController
 * @package App\Http\Controllers
 */
class AuthorMessageController extends Controller
{
    /**
     * List all messages of a specific author.
     *
     * @param Author $author
     * @return JsonResponse
     */
    public function index(Author $author): JsonResponse
    {
        return new JsonResponse(MessageResource::collection($author->messages));
    }

    /**
     * Store a message from an author in the database.
     *
     * @param MessageStoreRequest $request
     * @param Author $author
     * @return JsonResponse
     */
    public function store(MessageStoreRequest $request, Author $author): JsonResponse
    {
        $message = $author->messages()->save(new Message($request->all()));

        return new JsonResponse(new MessageResource($message));
    }
}
