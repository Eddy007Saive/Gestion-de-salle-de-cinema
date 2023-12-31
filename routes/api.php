<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\SalleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get("/findImage/{id}",[MovieController::class,"getImage"]);
Route::get("/findPlace/{id}",[SalleController::class,"getPlace"]);
Route::get('/film',[SalleController::class,"getPlace"]);
Route::get('/film/{jour}', [App\Http\Controllers\HomeController::class, 'getFilmByDay'])->name('film.by.day');


