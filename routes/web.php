<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductOptionsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\ContactController;


Route::prefix('admin')->group(function () {
    Route::get('/', [Controller::class, 'dashboard'])->name('dashboard');
//    Route::get('/users',[UserController::class,'list'])->name('get_list_user');
    Route::get('/products',[ProductController::class,'list'])->name('get_list_products');
    Route::get('/form',[Controller::class,'Show_form'])->name('get_form');
    Route::get('/sizes',[SizeController::class,'list'])->name('get_list_sizes');
    Route::get('/colors',[ColorController::class,'list'])->name('get_list_colors');
    Route::get('/categories',[CategoryController::class,'list'])->name('get_list_categories');
    Route::get('/Product/option',[ProductOptionsController::class,'list'])->name('get_list_product_options');
    Route::get('/orders',[OrderController::class,'list'])->name('get_list_orders');
    Route::get('/order_details',[OrderDetailController::class,'list'])->name('get_list_order_details');
    Route::get('/contacts',[ContactController::class,'list'])->name('get_list_contacts');
//    post methods
//    Route::post('/users/store',[UserController::class,'store'])->name('user_store');
    Route::post('/categories/store',[CategoryController::class,'store'])->name('category_store');
    Route::post('/Sizes/store',[SizeController::class,'store'])->name('size_store');
    Route::post('/Colors/store',[ColorController::class,'store'])->name('Color_store');
    Route::post('/Products/store',[ProductController::class,'store'])->name('product_store');



    Route::resource('user',UserController::class);
    Route::get('/user/{user}/upgrade',[UserController::class,'upgrade'])->name('user.upgrade');


});
