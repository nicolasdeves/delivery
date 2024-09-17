<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GerenciaController extends Controller
{
    public function addCardapio()
    {
        return view('site/add_cardapio');
    }

    public function listaCardapio()
    {
        return view('site/lista_cardapio');
    }

    public function login(Request $request, $erro = null)
    {
        if ($erro) {
            $erro = 'Usuário ou senha inválidos';
        }
        return view('site.login_user', ['erro' => $erro]);
    }

    public function menuAdm()
    {
        return view('adm/menu_adm');
    }
}
