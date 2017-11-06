<?php
use Alecrim\User;
use Alecrim\Order;

//HOME
Route::get('/', function () {
	//verifica usuario esta logado ou não
    if(Auth::guest()){
        return redirect('login');
    }
    $data               = array();
    $users              = User::where('status', '=', 1)->get();
    $usersOpenedOrder   = [];
    $orders             = Order::
                            whereHas('items', function($query) {
                                $query->where(
                                    [
                                        ['order_table', '>' , 0 ],
                                        ['order_status', '=' , 'pendente' ],
                                        ['item_status', '=', 0]
                                    ]);
                            })
                            ->where('status', 1)->get();
    $data['order'] = $orders;
    $data['users'] = $users;
    foreach ($orders as $key => $value) {
        $data['order'][$key]['items']   = $value->items;
        $data['order'][$key]['user']    = User::where([
                                                        ['id', '=', $value->user_id],
                                                        ['status', '=', 1]
                                                    ])->get();
    }
    return view('/home')->with('data', $data);  
});

//Authenticators
Route::get('login', 'AuthController@index');
Route::post('login', ['as' => 'login', 'uses' => 'AuthController@attempt']);
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
Route::get('lista-produtos/detalhes/{id}',['uses' => 'ProductController@show', 'as' => 'product.show']);
Route::get('lista-produtos/remove/{id}', ['uses' => 'ProductController@destroy', 'as' => 'product.destroy']);

//ITEMS
Route::get('/items/index',['as'=>'items.index', 'uses'=> 'ItemController@index']);
Route::get('/items/adicionar',['as'=>'items.adicionar', 'uses'=> 'ItemController@adicionar']);
Route::post('/items/salvar',['as'=>'items.salvar', 'uses'=> 'ItemController@salvar']);
Route::get('/items/editar/{id}',['as'=>'items.editar', 'uses'=> 'ItemController@editar']);
Route::put('/items/atualizar/{id}',['as'=>'items.atualizar', 'uses'=> 'ItemController@atualizar']);
Route::get('/items/deletar/{id}',['as'=>'items.deletar', 'uses'=> 'ItemController@deletar']);
Route::get('/items/search-products', ['as' => 'items.searchProducts', 'uses' => 'ItemController@searchProducts']);
Route::get('/items/detalhes/{id}',['as'=>'items.details', 'uses'=> 'ItemController@showDetails']);

// ORDERS
//Route::get('/orders/index',['as'=>'orders.index','uses'=>'OrderController@index']);
Route::get('/pedidos/detalhes/{id?}',['as'=>'orders.details','uses'=>'OrderController@details']);
Route::get('/pedidos/busca-itens', ['as' => 'orders.searchItems', 'uses' => 'OrderController@searchItems']);
Route::post('/pedidos/salvar', ['as' => 'orders.store', 'uses' => 'OrderController@store']);
Route::post('/pedidos/alterar', ['as' => 'orders.update', 'uses' => 'OrderController@update']);
Route::get('/pedidos/pagos', ['as' => 'orders.paid', 'uses' => 'OrderController@showPaidOrders']);
Route::get('/pedidos/pendetes', ['as' => 'orders.pending', 'uses' => 'OrderController@showPendingOrders']);
Route::get('/pedidos/deletar/{id}', ['as' => 'order.destroy', 'uses' => 'OrderController@destroy']);
Route::get('/pedidos/pendentes/{id}', ['as' => 'order.opened', 'uses' => 'OrderController@opened']);

// Relatórios
Route::get('/relatorio/gastos', ['as' => 'report.spending'  , 'uses' => 'ReportController@spendings']);

// Excel
Route::get('/excel/products/import', ['as' => 'products.import', 'uses' => 'ExcelController@importProducts']);
