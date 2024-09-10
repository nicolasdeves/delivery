<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardapioController extends Controller
{
    public function cardapio_burg()
    {
        return view('site.cardapio_burg');
    }

    public function cardapio_burg_batata()
    {
        return view('site.cardapio_burg_batata');
    }

    public function cardapio_entrada()
    {
        return view('site.cardapio_entrada');
    }

    public function cardapio_rango()
    {
        return view('site.cardapio_rango');
    }

    public function cardapio_drink()
    {
        return view('site.cardapio_drink');
    }
}
