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

    public function menuAdm()
    {
        return view('site/menu_adm');
    }
}
