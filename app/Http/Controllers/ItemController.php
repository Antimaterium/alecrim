<?php

namespace Alecrim\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Alecrim\Item;
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
        $dados = $request->all();

        $registro = new Item();
        $registro->item_name = $dados['item_name'];
        $registro->item_description = $dados['item_description'];
        $registro->item_categoria = $dados['item_categoria'];
        $registro->item_price = $dados['item_price'];

        $registro->save();

       \Session::flash('mensagem',['msg'=>'Registro Criado com sucesso!','class'=>'green white-text']);
       return redirect()->route('items.index');
    }

    public function editar($id)
    {
        $registro = Item::find($id);
        return view('items.editar', compact('registro'));
    }

    public function atualizar(ItemRequest $request, $id)
    {
        $registro = Item::find($id);
        $dados = $request->all();
        $registro->item_name = $dados['item_name'];
        $registro->item_description = $dados['item_description'];
        $registro->item_categoria = $dados['item_categoria'];
        $registro->item_price = $dados['item_price'];
        $registro->update();

        \Session::flash('mensagem',['msg'=>'Registro Atualizado com sucesso!','class'=>'green white-text']);
       return redirect()->route('items.index');
    }

    public function deletar($id)
    {
          Item::find($id)->delete();

        \Session::flash('mensagem',['msg'=>'Registro Deletado com sucesso!','class'=>'green white-text']);
       return redirect()->route('items.index');
    } 
}
