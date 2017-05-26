<?php

namespace alecrim\Http\Controllers;

use Illuminate\Http\Request;
use alecrim\Http\Requests\LoginRequest;
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

        if (!Auth::attempt($credentials)) {
            return redirect()->back()->withInput();
        }

            return redirect('/');    

    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }

}
