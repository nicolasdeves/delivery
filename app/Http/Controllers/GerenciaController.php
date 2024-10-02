<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class GerenciaController extends Controller
{
    public function addCardapio()
    {
        return view('adm/add_cardapio');
    }


    // ARRUMAR ESSA CARAIA
    public function listaCardapio()
    {
        $produtos = Produto::all();

        return view('adm/lista_cardapio', ['produtos' => $produtos]);
    }

    public function editaCardapio($id) {
        $produto = Produto::find($id);

        return view('adm/editar_cardapio', ['produto' => $produto]);
    }

    

    public function menuAdm()
    {
        return view('adm/menu_adm');
    }
}
