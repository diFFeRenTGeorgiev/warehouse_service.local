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

Route::get('/', function () {
    return view('index');
});
Route::get('tables/',function () {
    return view('stores.table');
})->name('web.index.createTable');
Route::prefix('warehouse/')->group(function () {
    Route::get('vehicles/', 'VehiclesController@showVehicles')->name('tab_content_vehicles');
});