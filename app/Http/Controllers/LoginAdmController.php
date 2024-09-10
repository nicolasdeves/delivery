<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginAdmController extends Controller
{
    public function login(){
        return view('site.loginAdm');
    }    

    public function autenticar(Request $request){
        $user = $request->input('usuario');
        $senha = $request->input('senha');

        if($user == 'admin' && $senha == 'admin'){
            $request->session()->put('login', $user);
            return redirect()->route('inicio');
        }else{
            return redirect()->route('loginAdm');
        }
    }
}
