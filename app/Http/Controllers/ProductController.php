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

        return view('added-product')->with('product_name', $name);
    }

    public function viewProduct() {
        $id = Request::route('id');
        $product = DB::select('SELECT * FROM products WHERE id = ?', [$id]);

        return view('details-product')->with('product',$product[0]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
