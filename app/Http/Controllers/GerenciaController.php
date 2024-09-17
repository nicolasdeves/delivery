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
        \Log::info($produtos);


        return view('site/lista_cardapio', ['produtos' => $produtos]);
    }

    public function editaExcluiCardapio()
    {
        return view('site/edita_exclui_cardapio');
    }

    public function menuAdm()
    {
        return view('site/menu_adm');
    }
}
