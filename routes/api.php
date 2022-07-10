<?php

use App\Http\Controllers\Todo\TaskController;
use Illuminate\Support\Facades\Route;

/**
 * API Todo
 */
Route::apiResource('/tasks', TaskController::class);

/**
 *  Route Home
 */
Route::get('/', function () {
    return response()->json(['status' => 'connected']);
});
