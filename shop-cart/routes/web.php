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
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;


use App\Http\Middleware\AuthMiddleware;

//Frontend
Route::get('/',[HomeController::class, 'index']);
Route::get('/trang-chu',[HomeController::class, 'index']);

//Backend

Route::middleware(AuthMiddleware::class)->group(function () {
    Route::get('/admin',[AdminController::class, 'index'])->withoutMiddleware(AuthMiddleware::class);
    Route::post('/admin_dashboard',[AdminController::class, 'dashboard'])->withoutMiddleware(AuthMiddleware::class);
    Route::get('/dashboard',[AdminController::class, 'show_dashboard']);
    Route::get('/logout',[AdminController::class, 'logout']);
    
    //Category product
    Route::get('/all-category',[CategoryController::class, 'all_category']);
    Route::get('/add-category',[CategoryController::class, 'add_category']);
    Route::post('/add_category',[CategoryController::class, 'insert_category']);
    Route::get('/edit-category/{categoryId}',[CategoryController::class, 'edit_category']);
    Route::post('/edit-category/{categoryId}',[CategoryController::class, 'edit_save_category']);
    Route::get('/delete-category/{categoryId}',[CategoryController::class, 'delete_category']);
    Route::get('/unactive-status-category/{categoryId}',[CategoryController::class, 'acctive_status']);
    Route::get('/active-status-category/{categoryId}',[CategoryController::class, 'unacctive_status']);
    
    //Brand product
    Route::get('/all-brand',[BrandController::class, 'all_brand']);
    Route::get('/add-brand',[BrandController::class, 'add_brand']);
    Route::post('/add_brand',[BrandController::class, 'insert_brand']);
    Route::get('/edit-brand/{brandId}',[BrandController::class, 'edit_brand']);
    Route::post('/edit-brand/{brandId}',[BrandController::class, 'edit_save_brand']);
    Route::get('/delete-brand/{brandId}',[BrandController::class, 'delete_brand']);
    Route::get('/unactive-status-brand/{brandId}',[BrandController::class, 'acctive_status']);
    Route::get('/active-status-brand/{brandId}',[BrandController::class, 'unacctive_status']);
    
    //Brand product
    Route::get('/all-product',[ProductController::class, 'all_product']);
    Route::get('/add-product',[ProductController::class, 'add_product']);
    Route::post('/add_product',[ProductController::class, 'insert_product']);
    Route::get('/edit-product/{productId}',[ProductController::class, 'edit_product']);
    Route::post('/edit-product/{productId}',[ProductController::class, 'edit_save_product']);
    Route::get('/delete-product/{productId}',[ProductController::class, 'delete_product']);
    Route::get('/unactive-status-product/{productId}',[ProductController::class, 'acctive_status']);
    Route::get('/active-status-product/{productId}',[ProductController::class, 'unacctive_status']);
});