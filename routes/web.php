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

//HOME
Route::get('/', function () {
    return view('home');
});

//LOGIN
Route::get('/login', 'AuthController@index');
Route::post('/login', 'AuthController@attempt');

//LOGOUT
Route::get('/logout', 'AuthController@logout');

//USERS
Route::get('/listar-usuarios', 'UserController@index');
Route::get('/cadastrar-usuario', 'UserController@create');
Route::post('/cadastrar-usuario', 'UserController@store');

//PRODUCTS
Route::get('/lista-produtos', 'ProductController@index');
Route::get('/lista-produtos/detalhes/{id}', 'ProductController@show');
Route::get('/lista-produtos/remove/{id}', 'ProductController@destroy');