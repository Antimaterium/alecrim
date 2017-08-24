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
  	
    /*public function save(ItemRequest $request)
    {
        // dados do request
        $data = $request->all();
        //items
        $item = new Item();
        $item->item_name = $data['item_name'];
        $item->item_description = $data['item_description'];
        $item->item_categoria = $data['item_category'];
        $item->item_price = $data['item_price'];
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
