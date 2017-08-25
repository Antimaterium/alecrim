<?php

namespace Alecrim\Http\Controllers;

use Alecrim\Item;

/*use Session;
use Alecrim\Product;

use App\Http\Requests;
use Illuminate\Http\Request;
use Alecrim\Http\Requests\ItemRequest;*/

class OrderController extends Controller
{
  	
    /*public function store(OrderRequest $request)
    {
        // dados do request
        $data = $request->all();
        //items
        $order = new Order();
        $order->order_table = $data['order_table'];
        $order->order_paid = $data['order_paid'];
        $order->order_total = $data['order_total'];
        $item->save();

        //products
        $product = new Product();
        $idProducts = $data['products'];

        foreach ($idProducts as $key => $value) {
            $product->id = $value;
            $product->items()->attach($item);
        }
    
       Session::flash('mensagem',['msg'=>'Registro Criado com sucesso!','class'=>'green white-text']);

       return response()->json(200);
    }

    public function editar($id)
    {
        $registro = Item::find($id);
        return view('items.editar', compact('registro'));
    }

    public function remove($id)
    {
          Item::find($id)->delete();

        Session::flash('mensagem',['msg'=>'Registro Deletado com sucesso!','class'=>'green white-text']);
       return redirect()->route('items.index');
    } */

    public function searchItems() {

        $items = Item::all();

        return response()->json($items);

    }
}
