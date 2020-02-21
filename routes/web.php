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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products/{id}', 'ProductController@show');

Route::middleware(['auth','user'])->group(function (){
    Route::post('/cart','CartDetailController@store');
    Route::delete('/cart','CartDetailController@destroy');
    Route::post('/cart/add','CartDetailController@add');

    Route::post('/cart/order','CartController@update');
});

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {

    Route::get('/products', 'ProductController@cIndex');// listado
    Route::get('/products/create','ProductController@cCreate');// formulario
    Route::post('/products','ProductController@cStore');// registrar
    Route::get('/products/{id}/edit','ProductController@edit');// vista de actualizar
    Route::post('/products/{id}/update','ProductController@update');// script de guardado de edicion
    Route::delete('/products/{id}','ProductController@destroy');//borrar elemento

    Route::get('/products/{id}/images', 'ImageController@index');
    Route::post('/products/{id}/images', 'ImageController@store');
    Route::delete('/products/{id}/images','ImageController@destroy');
    Route::post('/products/{id}/images/select/{idImage}', 'ImageController@select');
});
