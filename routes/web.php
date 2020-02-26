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

Route::get('/',  'HomeController@index');
Route::get('smartphones',  'SmartphoneController@index');
Route::get('smartphones/form',  'SmartphoneController@form');
Route::get('smartphones/{smartphones}/edit/',  'SmartphoneController@edit');
Route::patch('smartphones/{smartphones}',  'SmartphoneController@update');
Route::delete('smartphones/{smartphones}',  'SmartphoneController@delete');
Route::post('smartphones/save',  'SmartphoneController@save');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
