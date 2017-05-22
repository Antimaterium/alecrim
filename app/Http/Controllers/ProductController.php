<?php

namespace alecrim\Http\Controllers;

use Request;
use alecrim\Product;
use alecrim\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    public function show() {

        $products_list = Product::all();

        return view('list-products')->with('products_list', $products_list);

    }

    public function viewCreate() {
       
       return view('add-product');

    }

    public function create(ProductRequest $request) {

        Product::create($request->all()); 
        return redirect('/lista-produtos')->withInput();

    }

    public function details($id) {
        
        $product = Product::find($id);
        return view('details-product')->with('product',$product);

    }

    public function destroy($id) {
    
        $product = Product::find($id);
        $product->delete();

        return redirect('lista-produtos')->withInput();

    }

    
}
