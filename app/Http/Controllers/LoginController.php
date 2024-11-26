<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view("login.index");
    }

    public function store(Request $request) {
        if(!Auth::attempt($request->only("email","password"))) {
            return redirect()->back()->withErrors('Usuário ou senha incorretos');
        }

        return redirect()->route("seriados.index");
    }

    public function destroy() {
        Auth::logout();
        return to_route("login");
    }
}
