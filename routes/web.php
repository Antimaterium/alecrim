<?php
//HOME
Route::get('/', function () {
	//verifica usuario esta logado ou não
	    if(Auth::guest()){
	        return redirect('login');
	    }
		return view('/home');  
});

//Authenticators
Route::get('login', 'AuthController@index');
Route::post('login', 'AuthController@attempt');
Route::get('logout', 'AuthController@logout');

//USERS 
Route::get('listar-usuarios', ['uses' =>'UserController@index', 'as' => 'user.list' ]);
Route::get('editar-usuario/{id}', ['uses'=>'UserController@edit','as'=>'users.user-edit']);
Route::put('atualizar/{id}', ['uses'=>'UserController@update','as'=>'users.update']);
Route::get('destroy/{id}', ['uses'=>'UserController@destroy','as'=>'users.destroy']);
Route::get('cadastrar-usuario', 'UserController@create');
Route::post('cadastrar-usuario', 'UserController@store');

//PRODUCTS
Route::get('lista-produtos', ['uses' => 'ProductController@index', 'as' => 'product.list']);
Route::get('adiciona-produtos', 'ProductController@create');
Route::post('adiciona-produtos', 'ProductController@store');
Route::get('edita-produtos/{id}', ['uses' => 'ProductController@edit', 'as' => 'product.edit']);
Route::put('edita-produtos/{id}', ['uses' => 'ProductController@update', 'as' => 'product.update']);
Route::get('lista-produtos/detalhes/{id}', 'ProductController@show');
Route::get('lista-produtos/remove/{id}', ['uses' => 'ProductController@destroy', 'as' => 'product.destroy']);

//itens
Route::get('/items/index',['as'=>'items.index', 'uses'=> 'ItemController@index']);
Route::get('/items/adicionar',['as'=>'items.adicionar', 'uses'=> 'ItemController@adicionar']);
Route::post('/items/salvar',['as'=>'items.salvar', 'uses'=> 'ItemController@salvar']);
Route::get('/items/editar/{id}',['as'=>'items.editar', 'uses'=> 'ItemController@editar']);
Route::put('/items/atualizar/{id}',['as'=>'items.atualizar', 'uses'=> 'ItemController@atualizar']);
Route::get('/items/deletar/{id}',['as'=>'items.deletar', 'uses'=> 'ItemController@deletar']);
Route::get('/items/search-products', ['as' => 'items.searchProducts', 'uses' => 'ItemController@searchProducts']);