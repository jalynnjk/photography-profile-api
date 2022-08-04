<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PhotographerController;
use App\Http\Controllers\API\AlbumController;
use App\Http\Controllers\API\PhotoController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('photographers', PhotographerController::class);

Route::apiResource('albums', AlbumController::class);

Route::apiResource('photos', PhotoController::class);
