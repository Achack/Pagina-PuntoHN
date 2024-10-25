<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store(){
        
        auth()->guard()->logout();

        return redirect()->route('login');
    }
}
