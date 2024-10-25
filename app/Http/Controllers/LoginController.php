<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view("auth.login");
    }

    public function store(Request $request){
        
        //Validaciones
        $validateData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //Autenticar al usuario
        if(!auth()->guard()->attempt($request->only('email', 'password'), $request->remember)){
            return back()->with('message','Credenciales Incorrectas');
        }
        return redirect() ->route('post.index');
    }
}
