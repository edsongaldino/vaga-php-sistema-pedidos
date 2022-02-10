<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function store(Request $request)
    {
        if($this->verificaDuplicidade('email', $request->email)){
            return redirect()->back()->with('warning', 'Este e-mail ja está cadastrado! Verifique.'); 
        }

        $User = new User();
        $User->name = $request->name;
        $User->email = $request->email;
        $User->password = Hash::make($request->password);
        $User->save();

        return redirect()->back()->with('success', 'Sua conta foi criada!'); 
    }

    public function verificaDuplicidade($campo, $valor){

        $User = User::where($campo, $valor)->first();

        if(isset($User)){
            return $User;
        }else{
            return false;
        }
    }

    public function listUsers(Request $request){

        $data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = User::select("id","name")
            		->where('name','LIKE',"%$search%")
            		->get();
        }
        return response()->json($data);
    }
    
}
