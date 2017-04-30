<?php

namespace alecrim\Http\Controllers;

use Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function list() {

        $products_list = DB::select('SELECT * FROM products');

        return view('list-products')->with('products_list', $products_list);
    }

    public function viewAdd() {
       
       return view('add-product');
    }

    public function addProduct() {
        $name = Request::input('nome');
        $value = Request::input('valor');
        $quantity = Request::input('quantidade');
        $description = Request::input('descricao');

        $product_add = DB::table('products')->insert([
            'product_name' => $name,
            'product_description' => $description,
            'product_quantity' => $quantity,
            'product_price' => $value,

        ]);

        return redirect('/lista-produtos')->withInput();
    }

    public function viewProduct() {
        $id = Request::route('id');
        $product = DB::select('SELECT * FROM products WHERE id = ?', [$id]);

        return view('details-product')->with('product',$product[0]);
    }
    
}
