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
Route::get('/', [
		'as' => 'index',
		'uses' => 'CategoryController@index',
	]);

Route::post('/category', 'CategoryController@post');

Route::delete('/category/{category}', 'CategoryController@destroy');

Route::get('/categories', [
		'as' => 'categories.index',
		'uses' => 'ItemController@index',
	]);

Route::get('/categories/{categories}', 'ItemController@show');


// Route::get('/categories', 'SubcatController@index');

Route::get('/subcats/{categories}/{subcat}', 'SubcatController@show');

Route::post('/subcat/{subcat}', 'SubcatController@post');

Route::delete('/subcat/{subcat}', 'SubcatController@destroy');


Route::post('/item', 'ItemController@store');

Route::delete('/item/{item}', 'ItemController@destroy');


Route::post('upload', 'UploadController@postFile');

Route::get('/formz', function () {
	return view('formz');
});

Route::get('api/v1/get-items', 'ItemController@showAll');

Route::get('categories/api/v1/get-items', 'ItemController@showAll');

Route::get('categories/subcats/api/v1/get-items', 'ItemController@showAll');

Route::post('api/v1/solditem', 'SoldItemController@store');

Route::auth();