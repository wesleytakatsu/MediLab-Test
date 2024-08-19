<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PersonController;
use App\Http\Controllers\Api\Auth\AuthApiController;


Route::post('/login', [AuthApiController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthApiController::class, 'logout']);
    Route::post('/isloged', [AuthApiController::class, 'isloged']);
});

// USER ROUTES
Route::apiResource('users', UserController::class);
Route::post('/personuser', [UserController::class, 'storePerson']);

Route::get('/userss', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// PERSON ROUTES
Route::apiResource('people', PersonController::class);