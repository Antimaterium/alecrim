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

//PRODUTOS (lista, adiciona, mostra detalhes)
Route::get('/lista-produtos', 'ProductController@list');
Route::get('/lista-produtos/detalhes/{id}', 'ProductController@viewProduct');
Route::get('/lista-produtos/remove/{id}', 'ProductController@destroy');
Route::get('/adiciona-produtos', 'ProductController@viewAdd');
Route::post('/adiciona-produtos/concluido', 'ProductController@addProduct');

Auth::routes();

//Route::get('/home', 'HomeController@index');
