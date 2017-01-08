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
return File::get(public_path() . '/index.html');
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

//Routes for Order Entity
Route::get('order', 'OrderController@index');
Route::get('order/{id}', 'OrderController@getByID');
Route::post('order', 'OrderController@store');
Route::put('order/{id}', 'OrderController@update');
Route::delete('order/{id}', 'OrderController@destroy');

//Routes for Sale Entity
Route::get('sale', 'SaleController@index');
Route::get('sale/{id}', 'SaleController@getByID');
Route::post('sale', 'SaleController@store');
Route::put('sale/{id}', 'SaleController@update');
Route::delete('sale/{id}', 'SaleController@destroy');

//Routes for WarehouseItems Entity
Route::get('warehouseitem', 'WarehouseItemController@index');
Route::get('warehouseitem/{id}', 'WarehouseItemController@getByID');
Route::post('warehouseitem', 'WarehouseItemController@store');
Route::put('warehouseitem/{id}', 'WarehouseItemController@update');
Route::delete('warehouseitem/{id}', 'WarehouseItemController@destroy');



Auth::routes();

Route::get('/home', 'HomeController@index');

