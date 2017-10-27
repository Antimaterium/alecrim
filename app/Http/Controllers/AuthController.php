<?php

namespace Alecrim\Http\Controllers;

use Illuminate\Http\Request;
use Alecrim\Http\Requests\LoginRequest;
use Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users/login');
    }

    public function attempt(LoginRequest $request) {

        $credentials = $request->only(['email', 'password']);

        //se as credências coincidirem no banco, eu logo o usuário 
        if (Auth::attempt($credentials)) {
            //redirecionand o usuário para o dashboard
            \Session::flash('mensagem',['msg'=>'Logado com Sucesso.','class'=>'green white-text']);
            return redirect('/');    
        }
        
        //redirecionando o usuário para a página anterior(login)
        \Session::flash('mensagem',['msg'=>'Confira seus dados.','class'=>'red white-text']);
          
        
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }

}
