<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('/', function () {
//
//    dd('Welcome to admin user routes.');
//
//});
    Route::get('/', function () {
        return view('index');
    })->name('admin_page');
Route::get('add-product/', function () {
    return view('products.add_product_form');
    })->name('addProduct');