<?php

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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;

//Frontend
Route::get('/',[HomeController::class, 'index']);
Route::get('/trang-chu',[HomeController::class, 'index']);

//Backend
Route::get('/admin',[AdminController::class, 'index']);
Route::get('/dashboard',[AdminController::class, 'show_dashboard']);
Route::post('/admin_dashboard',[AdminController::class, 'dashboard']);
Route::get('/logout',[AdminController::class, 'logout']);

//Category product
Route::get('/all-category',[CategoryController::class, 'all_category']);
Route::get('/add-category',[CategoryController::class, 'add_category']);
