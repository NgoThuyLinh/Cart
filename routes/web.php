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
// Route::get('/product', 'ProductController@index')->name('product.index');
Route::get('/product', ['uses'=>'ProductController@index', 'as'=>'product.index']);
Route::post('product', 'ProductController@store')->name('product.store');
Route::get('/product/create', 'ProductController@create')->name('product.create');

Route::put('/product/{id}', 'ProductController@update')->name('product.update');
Route::get('/product/{id}', 'ProductController@show')->name('product.show')->where('id','[0-9]+');
Route::get('/product/{id}/edit', 'ProductController@edit')->name('product.edit');
Route::delete('/product/{id}', 'ProductController@destroy')->name('product.destroy');
Route::get('user/{name?}',function($name='Linh'){
	echo $name;
});


// Route::prefix('admin')->group(function(){
// 	//admin/product
// 	Route::resource('product', 'ProductController');

// });

	// Route::resource('product', 'ProductController');
