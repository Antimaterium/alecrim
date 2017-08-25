<?php

namespace Alecrim\Http\Controllers;

use Request;
use Session;
use Alecrim\Product;
use Alecrim\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    public function index() {

            //verifica usuario esta logado ou não
            if(\Auth::guest()){
                return redirect('login');
            }
        $products_list = Product::paginate(10);
        return view('products/list-products')->with('products_list', $products_list);

    }

    public function create() {
        //verifica usuario esta logado ou não
    if(\Auth::guest()){
        return redirect('login');
    }  

       return view('products/add-product');

    }

    public function store(ProductRequest $request) {

        Product::create($request->all()); 
        
        \Session::flash('mensagem',['msg'=>'Produto Cadastrado com Sucesso.','class'=>'red white-text']);

        return redirect('/lista-produtos')->withInput();

    }

    public function show($id) {
        //verifica usuario esta logado ou não
        if(\Auth::guest()){
            return redirect('login');
        }
        $product = Product::find($id);
        return view('products/details-product')->with('product',$product);

    }

    public function edit($id) {
        //verifica usuario esta logado ou não
        if(\Auth::guest()){
            return redirect('login');
        }
        $product = Product::find($id);

        if (!$product) {
            Session::flash('flash_message', [
                'msg'   => 'Este produto não existe.',
                'class' => 'alert-danger'
            ]);
            return redirect()->route('/lista-produtos');    
        }

        return view('products/edit-product', compact('product'));

    }

    public function update(ProductRequest $request, $id) {
            //verifica usuario esta logado ou não
            if(\Auth::guest()){
                return redirect('login');
            }
        Product::find($id)->update($request->all());

        Session::flash('flash_message', [
            'msg'   => 'Produto alterado com sucesso!',
            'class' => 'alert-danger'
        ]);
        return redirect('/lista-produtos')->withInput();
    }

    public function destroy($id) {
        //verifica usuario esta logado ou não
        if(\Auth::guest()){
            return redirect('login');
        }
    
        $product = Product::find($id);
        $product->delete();
        Session::flash('flash_message', [
            'msg'   => 'Produto apagado com sucesso!',
            'class' => 'alert-danger'
        ]);

        return redirect('/lista-produtos')->withInput();

    }

    
}
