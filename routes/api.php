<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SingerController;
use App\Http\Controllers\SongController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/singers', [SingerController::class, 'getAllSingers']);
Route::get('/genres', [GenreController::class, 'getAllGenres']);
Route::get('/songs', [SongController::class, 'getAllSongs']);

Route::post('/saveSinger', [SingerController::class,'saveSinger']);
Route::post('/saveSong', [SongController::class, 'saveSong']);
