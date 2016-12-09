<?php

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
    return view('welcome');
});


//Routes for Warehouse Entity
Route::get('warehouse', 'WarehouseController@index');
Route::get('warehouse/{id}', 'WarehouseController@getByID');
Route::post('warehouse', 'WarehouseController@store');
Route::put('warehouse/{id}', 'WarehouseController@update');
Route::delete('warehouse/{id}', 'WarehouseController@destroy');

//Routes for Item Entity
Route::get('item', 'ItemController@index');
Route::get('item/{id}', 'ItemController@getByID');
Route::post('item', 'ItemController@store');
Route::put('item/{id}', 'ItemController@update');
Route::delete('item/{id}', 'ItemController@destroy');

//Routes for Supplier Entity
Route::get('supplier', 'SupplierController@index');
Route::get('supplier/{id}', 'SupplierController@getByID');
Route::post('supplier', 'SupplierController@store');
Route::put('supplier/{id}', 'SupplierController@update');
Route::delete('supplier/{id}', 'SupplierController@destroy');

//Routes for Vendor Entity
Route::get('vendor', 'VendorController@index');
Route::get('vendor/{id}', 'VendorController@getByID');
Route::post('vendor', 'VendorController@store');
Route::put('vendor/{id}', 'VendorController@update');
Route::delete('vendor/{id}', 'VendorController@destroy');