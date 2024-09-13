<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginAdmController extends Controller
{
    public function login(Request $request, $erro = null){

        if ($erro) {
            $erro = 'Usuário ou senha inválidos';
        }
        return view('site.loginAdm', ['erro' => $erro]);
    }    

    public function autenticar(Request $request){


        $user = $request->input('usuario');
        $senha = $request->input('senha');

        if($user == 'admin' && $senha == 'admin'){
            $request->session()->put('login', $user);
            return redirect()->route('adicionar-cardapio');
        }else{
            return redirect()->route('loginAdm', ['erro' => 1]);
        }
    }
}
