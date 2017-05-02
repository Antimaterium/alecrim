<?php

namespace alecrim\Http\Controllers;

use Request;
use Illuminate\Support\Facades\DB;
use alecrim\Product;

class ProductController extends Controller
{

    public function list() {

        $products_list = Product::all();

        return view('list-products')->with('products_list', $products_list);

    }

    public function viewAdd() {
       
       return view('add-product');

    }

    public function addProduct() {

        Product::create(Request::all()); 

        return redirect('/lista-produtos')->withInput();

    }

    public function viewProduct($id) {
        
        $product = Product::find($id);

        return view('details-product')->with('product',$product);

    }

    public function destroy($id) {
    
        $product = Product::find($id);
        $product->delete();

        return redirect('lista-produtos');

    }

    
}
