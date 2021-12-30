<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return view('home');
});

// route login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// route register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// route Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/profile/{id}', [DashboardController::class, 'profile'])->middleware('auth');


// route produk
Route::resource('/product', ProductController::class)->middleware('auth');

// route kategory
Route::resource('/category', CategoryController::class)->middleware('auth');

// route pelanggan
Route::resource('/pelanggan', PelangganController::class)->middleware('auth');

// Route::get('/pelanggan', [PelangganController::class, 'index'])->middleware('auth');
// Route::get('/pelanggan/create', [PelangganController::class, 'create'])->middleware('auth');
// Route::post('/pelanggan/store', [PelangganController::class, 'store'])->middleware('auth');
// Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'])->middleware('auth');
