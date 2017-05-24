<?php

namespace alecrim\Http\Controllers;

use Illuminate\Http\Request;
use alecrim\User;
use alecrim\Http\Requests\UserRequest;

class UserController extends Controller
{

    public function index()
    {
        $users_list = User::all();
        return view('users/show-users')->with('users_list', $users_list);
    }

    public function create() {
        return view('users/user-register');
    }

    public function store(UserRequest $request)
    {
        User::create($request->all()); 
        return redirect('/listar-usuarios')->withInput();
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
