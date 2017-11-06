<?php

namespace Alecrim\Http\Controllers;

use Request;
use Session;
use Alecrim\Product;
use Alecrim\Provider;
use Alecrim\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    public function index() {

        //verifica usuario esta logado ou não
        if(\Auth::guest()){
            return redirect('login');
        }
        
        $products_list = Product::where('status', '=', '1')->get();
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

        $product    = new Product();
        $provider   = array('provider_name' => $request['provider_name']);

        $product->product_name                          = $request['product_name'];
        $product->product_price                         = $request['product_price'];
        $product->product_description                   = $request['product_description'];
        $product->product_packing                       = $request['product_packing'];
        $product->product_quantity                      = $request['product_quantity'];
        $product->product_initial_quantity              = $request['product_quantity'];
        $product->product_purchase_price                = $request['product_purchase_price'];
        $product->product_acceptable_minimum_quantity   = $request['product_acceptable_minimum_quantity'];
        $product->product_purchase_unit_price           = $request['product_purchase_unit_price'];
        $product->status                                = 1;
        $provider['provider_name']                      = $request['provider_name'];

        if (!empty($provider['provider_name'])) {
            $product->provider()->create($provider);
        }
        $product->save();

        return redirect('/lista-produtos')->withInput();

    }

    public function show($id) {
        //verifica usuario esta logado ou não
        if(\Auth::guest()){
            return redirect('login');
        }
        $product = Product::find($id);
        $provider = Provider::find($id);

        return view('products/details-product', compact('product', 'provider'));
        
    }

    public function edit($id) {
        //verifica usuario esta logado ou não
        if(\Auth::guest()){
            return redirect('login');
        }
        
        $product = Product::find($id);
        $provider = Product::find($id);
        if (!$product) {
            Session::flash('flash_message', [
                'msg'   => 'Este produto não existe.',
                'class' => 'alert-danger'
            ]);
            return redirect()->route('/lista-produtos');    
        }

        return view('products/edit-product', compact('product','provider'));

    }

    public function update(ProductRequest $request, $id) {
            
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
        $product->status = 0;
        $product->save();
        Session::flash('flash_message', [
            'msg'   => 'Produto apagado com sucesso!',
            'class' => 'alert-danger'
        ]);

        return redirect('/lista-produtos')->withInput();

    }

    
}
