<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
route::post('/register', [AuthController::class, 'register']);
route::post('/login', [AuthController::class, 'login']);

route::middleware('auth:sanctum')->group(function () {
    route::post('/logout', [AuthController::class, 'logout']);
    route::get('/me', [AuthController::class, 'me']);
    
    route::get('/posts', [PostController::class, 'index']);
    route::post('/posts', [PostController::class, 'store']);
    route::get('/posts/{id}', [PostController::class, 'show']);
    route::put('/posts/{id}', [PostController::class, 'update']);
    route::delete('/posts/{id}', [PostController::class, 'destroy']);
});


route::get('/posts', [PostController::class, 'index']);
route::post('/posts', [PostController::class, 'store']);
route::get('/posts/{id}', [PostController::class, 'show']);
route::put('/posts/{id}', [PostController::class, 'update']);
route::delete('/posts/{id}', [PostController::class, 'destroy']);
Route::apiResource('lokasi', LokasiController::class);