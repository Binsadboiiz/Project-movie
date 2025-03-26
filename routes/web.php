<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\MovieController;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/movies', [PageController::class, 'showAllMovies'])->name('movie');
Route::get('/movies/{id}', [PageController::class, 'showMovieDetail'])->name('movie.detail');

Route::get('/api/movies', [MovieController::class, 'apiIndex'])->name('api.movies');

Route::get('/login.form', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/movies', [MovieController::class, 'index'])->name('admin.movies.index');
    Route::get('/admin/movies/create', [MovieController::class, 'create'])->name('admin.movies.create');
    Route::post('/admin/movies', [MovieController::class, 'store'])->name('admin.movies.store');
    Route::get('/admin/movies/{movie}/edit', [MovieController::class, 'edit'])->name('admin.movies.edit');
    Route::put('/admin/movies/{movie}', [MovieController::class, 'update'])->name('admin.movies.update');
    Route::delete('/admin/movies/{movie}', [MovieController::class, 'destroy'])->name('admin.movies.destroy');
});
