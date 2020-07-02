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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/vehicles/index', 'VehicleController@index')->name('vehicle.index');
Route::post('/admin/vehicle/store', 'VehicleController@store')->name('vehicle.store');
Route::delete('/admin/vehicle/{vehicle}/delete', 'VehicleController@destroy')->name('vehicle.destroy');
Route::post('/admin/vehicle/{vehicle}/edit', 'VehicleController@edit')->name('vehicle.edit');
Route::put('/admin/vehicle/{vehicle}/update', 'VehicleController@update')->name('vehicle.update');

Route::get('/admin/parts/index', 'PartController@index')->name('parts.index');
Route::post('/admin/part/store', 'PartController@store')->name('part.store');
Route::delete('/admin/part/{part}/destroy', 'PartController@destroy')->name('part.destroy');
Route::get('/admin/part/{part}/edit', 'PartController@edit')->name('part.edit');
Route::put('/admin/part/{part}/update', 'PartController@update')->name('part.update');