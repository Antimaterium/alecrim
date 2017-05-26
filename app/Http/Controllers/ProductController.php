<?php

namespace alecrim\Http\Controllers;

use Request;
use Session;
use alecrim\Product;
use alecrim\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    public function index() {

        $products_list = Product::paginate(2);
        return view('products/list-products')->with('products_list', $products_list);

    }

    public function create() {
       
       return view('products/add-product');

    }

    public function store(ProductRequest $request) {

        Product::create($request->all()); 
        return redirect('/lista-produtos')->withInput();

    }

    public function show($id) {
        
        $product = Product::find($id);
        return view('products/details-product')->with('product',$product);

    }

    public function edit($id) {

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
        Product::find($id)->update($request->all());

        Session::flash('flash_message', [
            'msg'   => 'Produto alterado com sucesso!',
            'class' => 'alert-danger'
        ]);
        return redirect('/lista-produtos')->withInput();
    }

    public function destroy($id) {
    
        $product = Product::find($id);
        $product->delete();
        Session::flash('flash_message', [
            'msg'   => 'Produto apagado com sucesso!',
            'class' => 'alert-danger'
        ]);

        return redirect('/lista-produtos')->withInput();

    }

    
}
