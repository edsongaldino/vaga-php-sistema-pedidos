<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function home(){

        if(Auth::check() === true){
            return view('products');
        }

        return redirect()->route('login')->with('warning', 'Efetue Login para acessar');
    }

    public function Login(Request $request){
        
        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            return redirect()->back()->with('warning', 'O e-mail não é válido!');    
        }

        $credencials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credencials)){
            $usuario = Auth::user();
            Session::put('usuario', $usuario);
            return redirect()->route('products')->with('success', 'Login Efetuado!');
        }
        return redirect()->back()->with('warning', 'Os dados informados estão incorretos!');
    }

    public function Logout(){
        
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logof Efetuado');
    }
}
