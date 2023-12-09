<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\HoraireController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SalleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Routes admin
Route::prefix('home')->group(function () {
    Route::prefix('film')->group(function () {
        Route::get('/', [MovieController::class, 'index'])->name('film');
        Route::get('/create', [MovieController::class, 'create'])->name('film.create');
        Route::post('/create', [MovieController::class, 'store'])->name('film.store');
        Route::delete('delete/{id}', [MovieController::class, 'delete'])->name('film.delete');
        Route::get('update/{id}', [MovieController::class, 'modify'])->name('film.modify');
        Route::post('/update', [MovieController::class, 'update'])->name('film.update');
        Route::get("/voir/{id}", [MovieController::class, 'view'])->name('film.view');
    });

    Route::prefix('Salle')->group(function () {
        Route::get('/', [SalleController::class, 'index'])->name('Salle');
        Route::get('/create', [SalleController::class, 'create'])->name('Salle.create');
        Route::post('/create', [SalleController::class, 'store'])->name('Salle.store');
        Route::delete('delete/{id}', [SalleController::class, 'delete'])->name('Salle.delete');
        Route::get('update/{id}', [SalleController::class, 'modify'])->name('Salle.modify');
        Route::post('/update', [SalleController::class, 'update'])->name('Salle.update');
        Route::get("/voir/{id}");
    });

    Route::prefix('Horaire')->group(function () {
        Route::get('/', [HoraireController::class, 'index'])->name('Horaire');
        Route::get('/create', [HoraireController::class, 'create'])->name('Horaire.create');
        Route::post('/create', [HoraireController::class, 'store'])->name('Horaire.store');
        Route::delete('delete/{id}', [HoraireController::class, 'delete'])->name('Horaire.delete');
        Route::get('update/{id}', [HoraireController::class, 'modify'])->name('Horaire.modify');
        Route::post('/update', [HoraireController::class, 'update'])->name('Horaire.update');
        Route::get("/voir/{id}");
    });


    Route::prefix('Genre')->group(function () {
        Route::get('/', [GenreController::class, 'index'])->name('Genre');
        Route::get('/create', [GenreController::class, 'create'])->name('Genre.create');
        Route::post('/create', [GenreController::class, 'store'])->name('Genre.store');
        Route::delete('delete/{id}', [GenreController::class, 'delete'])->name('Genre.delete');
        Route::get('update/{id}', [GenreController::class, 'modify'])->name('Genre.modify');
        Route::post('/update', [GenreController::class, 'update'])->name('Genre.update');
    });
});
