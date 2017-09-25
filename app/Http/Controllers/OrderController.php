<?php

namespace Alecrim\Http\Controllers;
use Alecrim\Item;
use Alecrim\Order;
use Alecrim\Product;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;  
use Alecrim\Http\Requests\OrderRequest;
// use Session;
use Illuminate\Http\Request;


class OrderController extends Controller
{
  	
    public function store(OrderRequest $request) {

        // dados do request
        $data = $request->all();
        // order
        $order = new Order();
        $order->user_id = $data['atendent'];        
        $order->order_table = $data['table'];
        $order->order_paid = $data['paid'];
        $order->order_total = $data['order_total'];
        $order->order_status = $data['order_status'];
        $order->save();

        // new item
        $item = new Item();
        // item list
        $items = $data['items'];

        // iterating items
        foreach ($items as $key => $value) {
            // id item
            $item->id = $value['item']['id'];
            // iterating products
            foreach($item->products as $key2 => $value2) {
                $item->products[$key2]->product_quantity -= $value['quantity'];
                $item->products[$key2]->save(); 
            }
            $item->orders()->attach($order);
        }

       return response()->json(['ok' => 200]);

    }

    public function showPaidOrders() {
        $order_list = Order::where('order_status', 'pago')->paginate(10);
        return view('orders/list-orders')->with('order_list', $order_list);
    }

    public function showPendingOrders() {
        $order_list = Order::where('order_status', 'pendente')->paginate(10);
        return view('orders/list-orders')->with('order_list', $order_list);
    }

    /*public function editar($id)
    {
        $registro = Item::find($id);
        return view('items.editar', compact('registro'));
    }*/

    public function destroy($id) {
        $order = Order::find($id);        
        $order->items()->detach();
        $order->delete();
        return redirect()->route('orders.pending');
    } 

    public function searchItems() {

        $items = Item::all();

        return response()->json($items);

    }
}
