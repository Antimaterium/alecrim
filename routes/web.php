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

Route::get('/', function() {
	return view('home');
});

//PRODUCTS (create, show, details, destroy)
Route::get('/lista-produtos', 'ProductController@show');
Route::get('/lista-produtos/detalhes/{id}', 'ProductController@details');
Route::get('/lista-produtos/remove/{id}', 'ProductController@destroy');
Route::get('/adiciona-produtos', 'ProductController@viewCreate');
Route::post('/adiciona-produtos/concluido', 'ProductController@create');

//USERS (create, show, details, destroy)
Auth::routes();
Route::get('/cadastrar-usuario', 'UserController@create');
Route::post('/cadastrar-usuario', 'UserController@store');
Route::get('/lista-usuarios', 'UserController@index');
// Route::delete('/lista-usuarios/{id}', 'UserController@destroy');
// Route::get('/lista-usuarios/{id}/edita', 'UserController@edit');
// Route::put('/lista-usuarios/{id}', 'UserController@update');

//Route::get('/home', 'HomeController@index');
