<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardapioController extends Controller
{
    public function cardapio_burg()
    {
        return view('cardapio_burg');
    }

    public function cardapio_burg_batata()
    {
        return view('cardapio_burg_batata');
    }

    public function cardapio_entrada()
    {
        return view('cardapio_entrada');
    }

    public function cardapio_rango()
    {
        return view('cardapio_rango');
    }

    public function cardapio_drink()
    {
        return view('cardapio_drink');
    }
}
