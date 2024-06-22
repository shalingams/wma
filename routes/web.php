<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/admin/events', [EventController::class, 'list'])->name('admin.events');
    Route::get('/admin/events/create', [EventController::class, 'create'])->name('events.create');
    Route::get('/admin/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::post('/admin/events/store', [EventController::class, 'store'])->name('events.store');
    Route::post('/admin/events/{id}/update', [EventController::class, 'update'])->name('events.update');
    Route::get('/events/{id}/destroy', [EventController::class, 'destroy'])->name('events.destroy');


    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::post('/users/{id}/update', [UserController::class, 'update'])->name('users.update');

    Route::get('/admin/news', [NewsController::class, 'list'])->name('admin.news');
    Route::get('/admin/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::get('/admin/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::post('/admin/news/store', [NewsController::class, 'store'])->name('news.store');
    Route::post('/admin/news/{id}/update', [NewsController::class, 'update'])->name('news.update');
    Route::get('/news/{id}/destroy', [NewsController::class, 'destroy'])->name('news.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/password-reset', [ProfileController::class, 'password_reset'])->name('profile.password_reset');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
