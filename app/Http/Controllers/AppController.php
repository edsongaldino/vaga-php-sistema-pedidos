<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function login(){
        return view('login.index');
    }

    public function register(){
        return view('login.register');
    }

    public function home(){
        return view('home');
    }

    public function products(){
        return view('products.index');
    }
    
}
