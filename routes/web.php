<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
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

Route::redirect('/', '/blog');
// login routes
Route::view("/login", 'pages.login')->name('log');
Route::post("/login", [UserController::class, 'login'])->name('login');
Route::get("/logout", [UserController::class, 'logout'])->name('logout');

// blogs route with middleware for admin
Route::resource("/blog", BlogController::class)->only('show', 'index');
Route::resource("/admin/blog", BlogController::class)->except('show', 'index')->middleware('user');
