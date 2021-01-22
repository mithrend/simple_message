<?php

use Illuminate\Support\Facades\Route;

Route::apiResource('authors.messages', AuthorMessageController::class)->shallow();
Route::apiResource('authors', AuthorController::class);
Route::apiResource('messages', MessageController::class)->except('store');
