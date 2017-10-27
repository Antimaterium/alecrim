<?php

namespace Alecrim\Http\Controllers;

use Session;
use Alecrim\Item;
use Alecrim\Product;

use App\Http\Requests;
use Illuminate\Http\Request;
use Alecrim\Http\Requests\ItemRequest;

class ItemController extends Controller
{
   public function index()
    {
        $registros = Item::all();
        return view('items.index', compact('registros'));
    }

    public function adicionar()
    {
        return view('items.adicionar');
    }
    public function salvar(ItemRequest $request)
    {
        
        $data               = $request->all();   // dados do request
        $products           = $data['products']; // array de produtos retornados da view
        $idProducts         = array();           // array dos ids de produtos
        $quantityProducts   = array();           // array da quantidade dos produtos
        $item               = new Item();        // items
        $product            = new Product();     // products

        
        $item->item_name = $data['item_name'];
        $item->item_description = $data['item_description'];
        $item->item_category = $data['item_category'];
        $item->item_price = $data['item_price'];
        $item->save();
        
        foreach ($products as $key => $value) {
            $idProducts[$key]       = $value['product_id'];
            $quantityProducts[$key] = $value['product_quantity'];
        }

        foreach ($idProducts as $key => $value) {
            $product->id = $value;
            $product->items()->attach($item, ['product_quantity' => $quantityProducts[$key]]);
        }
        
        Session::flash('mensagem',['msg'=>'Registro Criado com sucesso!','class'=>'green white-text']);
        
        return response()->json(200);
    }

    public function editar($id)
    {
        $item = Item::find($id);
        $products = $item->products;
        return view('items/editar', compact('item'));
    }

    public function showDetails($id) {
        $item = Item::find($id);
        $products = $item->products;
        return view('items/details', compact('item'));
    }

    public function atualizar(ItemRequest $request, $id)
    {
        $registro = Item::find($id);
        $dados = $request->all();
        $registro->item_name = $dados['item_name'];
        $registro->item_description = $dados['item_description'];
        $registro->item_category = $dados['item_category'];
        $registro->item_price = $dados['item_price'];
        $registro->update();

        Session::flash('mensagem',['msg'=>'Registro Atualizado com sucesso!','class'=>'green white-text']);
       return redirect()->route('items.index');
    }

    public function deletar($id)
    {
        $item = Item::find($id);
        $item->products()->detach();
        $item->delete();

        Session::flash('mensagem',['msg'=>'Registro Deletado com sucesso!','class'=>'green white-text']);
        return redirect()->route('items.index');
    } 

    public function searchProducts() {

        $products = Product::all();

        return response()->json($products);

    }
}
