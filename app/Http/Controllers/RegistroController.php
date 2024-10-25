<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class RegistroController extends Controller
{
    public function index() {
        return view('auth.registro');
    }

    public function store(Request $request) {
        
        //Modificar el Request
        $request->request->add(['username' => Str::slug($request->username)]);

        //Validaciones
        $validateData = $request->validate([
            'name' => 'required|max:30',
            'username' => 'required|max:20|min:3|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6' 
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        //Autenticar al usuario
        auth()->guard()->attempt($request->only('email', 'password'));


        //Redireccionar
        return redirect()->route('post.index');

    }
}