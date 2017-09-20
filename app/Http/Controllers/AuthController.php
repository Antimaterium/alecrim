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
            return redirect('/');    
        }
        //redirecionand o usuário para a página anterior(login)
        return redirect()->back()->withInput();

    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }

}
