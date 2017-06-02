<?php

namespace Alecrim\Http\Controllers;

use Illuminate\Http\Request;
use Alecrim\User;
use Alecrim\Http\Requests\UserRequest;
use Session;

class UserController extends Controller
{
   
    public function index()
    {
            //verifica usuario esta logado ou não
            if(\Auth::guest()){
                return redirect('login');
            }
        $users_list = User::all();
        return view('users/show-users')->with('users_list', $users_list);
    }

    public function create() {
        //verifica usuario esta logado ou não
    if(\Auth::guest()){
        return redirect('login');
    }
        return view('users/user-register');
    }

    public function store(UserRequest $request)
    {
        //verifica usuario esta logado ou não
        if(\Auth::guest()){
          return redirect('login');
        }
        User::create($request->all()); 
        return redirect('/listar-usuarios')->withInput();
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        //verifica usuario esta logado ou não
        if(\Auth::guest()){
            return redirect('login');
        }
        $user = User::find($id);
        if(!$user){
           
            Session::flash('flash_message',[
                'msg'=>"Não Existe Esse Usuario cadastrado! Deseja Cadastrar um novo Usuario?",
                'class'=>"alert-danger"
                ]);
            return redirect()->route('/listar-usuarios');
        }

            return view('users.user-edit',compact('user'));
    }

    public function update(Request $request,$id)
    {
              //verifica usuario esta logado ou não
            if(\Auth::guest()){
                return redirect('login');
            }
            User::find($id)->update($request->all());
        
           // User::create($request->all());
            
            Session::flash('flash_message',[
                'msg'=>"Usuário Atualizado com sucesso!?",
                'class'=>"alert-success"
                ]);

            return redirect('/listar-usuarios')->withInput();
    }
    

    public function destroy($id)
    {
        //verifica usuario esta logado ou não
        if(\Auth::guest()){
         return redirect('login');
        }   
        $user = User::find($id);
        $user->delete();
        Session::flash('flash_message',[
                'msg'=>"Usuário deletado com sucesso!?",
                'class'=>"alert-success"
                ]);

        return redirect('/listar-usuarios')->withInput();
    }
}
