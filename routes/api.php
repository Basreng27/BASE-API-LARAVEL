<?php

use App\Http\Controllers\API\ComicsController;
use App\Http\Controllers\API\ConsumeAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/consumeAPI', [ConsumeAPIController::class, 'index']);

Route::middleware("auth:sanctum")->group(function () {
    Route::get('/comics', [ComicsController::class, 'index']);
    Route::post('/comics', [ComicsController::class, 'create']);
    Route::put('/comics/{id}', [ComicsController::class, 'update']);
    Route::delete('/comics/{id}', [ComicsController::class, 'delete']);
});
