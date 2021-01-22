<?php

namespace App\Http\Controllers;

use App\Author;
use App\Http\Resources\AuthorWithMessageResource;
use App\Message;
use App\Http\Resources\MessageWithAuthorResource;
use App\Http\Requests\MessageUpdateRequest;
use Illuminate\Http\JsonResponse;
use Exception;

/**
 * Class MessageController
 * @package App\Http\Controllers
 */
class MessageController extends Controller
{
    /**
     * Display a list of all messages with author information, grouped by author.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return new JsonResponse(AuthorWithMessageResource::collection(Author::has('messages')->get()));
    }

    /**
     * Get a specific message.
     *
     * @param Message $message
     * @return JsonResponse
     */
    public function show(Message $message): JsonResponse
    {
        return new JsonResponse(new MessageWithAuthorResource($message));
    }

    /**
     * Update the message in the database.
     *
     * @param MessageUpdateRequest $request
     * @param Message $message
     * @return JsonResponse
     */
    public function update(MessageUpdateRequest $request, Message $message): JsonResponse
    {
        $message->update($request->all());

        return new JsonResponse(null, 204);
    }

    /**
     * Remove the message from the database.
     *
     * @param Message $message
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Message $message): JsonResponse
    {
        try {
            $message->delete();
        } catch (Exception $exception) {
            return  new JsonResponse($exception->getMessage(), 500);
        }

        return new JsonResponse(null, 204);
    }
}
