<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


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


Route::post('/task/create', [TaskController::class, 'create']);

Route::get('/task/{id}', [TaskController::class, 'show'])->where('id', '[0-9]+');

Route::put('/task/{id}', [TaskController::class, 'update'])->where('id', '[0-9]+');

Route::delete('/task/{id}', [TaskController::class, 'destroy'])->where('id', '[0-9]+');
