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

Auth::routes();

Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('products', 'ProductController@index');
Route::get('products/create', 'ProductController@create');
Route::post('products', 'ProductController@store');
Route::get('products/{id}/edit', 'ProductController@edit');
Route::get('products/{id}/details', 'ProductController@show');
Route::put('products/{id}', 'ProductController@update');
Route::delete('products/{id}/delete', 'ProductController@destroy');
