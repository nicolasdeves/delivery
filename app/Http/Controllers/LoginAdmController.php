<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\LoginAdmMiddleware;

class LoginAdmController extends Controller
{
    public function loginAdm(Request $request, $erro = null)
    {

        if ($erro) {
            $erro = 'Usuário ou senha inválidos';
        }
        return view('adm.loginAdm', ['erro' => $erro]);
    }

    public function autenticar(Request $request)
    {

        $user = $request->input('usuario');
        $senha = $request->input('senha');

        if ($user == 'admin' && $senha == 'admin') {
            $request->session()->put('admin', $user);
            return redirect()->route('menuAdm');
        } else {
            return redirect()->route('loginAdm', ['erro' => 1]);
        }
    }
}
