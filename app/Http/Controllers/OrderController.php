<?php

namespace Alecrim\Http\Controllers;

use Alecrim\Item;
use Alecrim\Order;
use App\Http\Requests;
// use Session;
use Illuminate\Http\Request;


class OrderController extends Controller
{
  	
    public function store(Request $request)
    {
        // dados do request
        $data = $request->all();
        //items
        $order = new Order();
        $order->user_id = $data['atendent'];        
        $order->order_table = $data['table'];
        $order->order_paid = $data['paid'];
        $order->order_total = $data['total'];
        $order->save();

        //products
        $items = new Item();
        $idItems = $data['items'];

        foreach ($idItems as $key => $value) {
            $items->id = $value;
            $items->orders()->attach($order);
        }

       return response()->json(200);
    }

    /*public function editar($id)
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
