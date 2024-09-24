<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class GerenciaController extends Controller
{
    public function addCardapio()
    {
        return view('site/add_cardapio');
    }

    public function listaCardapio()
    {
        $produtos = Produto::all();

        return view('site/lista_cardapio', ['produtos' => $produtos]);
    }

    public function editaExcluiCardapio()
    {
        return view('site/edita_exclui_cardapio');
    }

    public function editaCardapio($id) {
        $produto = Produto::find($id);

        return view('site/editar_cardapio', ['produto' => $produto]);
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
