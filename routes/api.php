<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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



Route::post('/public/login', [UserController::class, 'login']);
Route::post('/public/register', [UserController::class, 'register']);

Route::middleware('auth:sanctum')->post('/public/loginCheck', [UserController::class, 'loginCheck']);
Route::middleware('auth:sanctum')->post('/private/users', [UserController::class, 'index']);
