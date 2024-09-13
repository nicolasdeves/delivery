<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GerenciaController extends Controller
{
    public function index()
    {
        return view('site/add_cardapio');
    }

    public function listaCardapio()
    {
        return view('site/lista_cardapio');
    }

    public function menuADM()
    {
        return view('site/menu_adm');
    }
}
