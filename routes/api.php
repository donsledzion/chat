<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ChatMessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('projects', ProjectController::class);
Route::get('projects/{project}/messages', [ChatMessageController::class, 'index']);
Route::post('projects/{project}/messages', [ChatMessageController::class, 'store']);
Route::post('/messages', [ChatMessageController::class, 'store']);
Route::get('/projects/{project}/messages', [ChatMessageController::class, 'index']);
