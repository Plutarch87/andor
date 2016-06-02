<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/home', 'HomeController@index');


Route::get('/', 'CategoryController@index');

Route::post('/category', 'CategoryController@post');

Route::delete('/category/{category}', 'CategoryController@destroy');

Route::get('/categories', 'ItemController@index');

Route::get('/categories{categories}', 'ItemController@show');


Route::get('/categories', 'SubcatController@index');

Route::get('/subcat/{subcat}', 'SubcatController@show');

Route::post('/subcat', 'SubcatController@store');


Route::post('/item', 'ItemController@post');

Route::delete('/item/{item}', 'ItemController@destroy');


Route::post('upload', 'UploadController@postFile');

Route::get('/formz', function () {
	return view('formz');
});

Route::auth();