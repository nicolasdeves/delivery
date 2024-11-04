<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoCozinhaController extends Controller
{
    public function pedidoCozinha(){
        $pedidosAbertos = Pedido::where('status_pedido', '0')->get();
        $pedidosEmProducao = Pedido::where('status_pedido', '1')->get();
        $pedidosFinalizados = Pedido::where('status_pedido', '2')->get();
    
        return view('adm/pedidos_cozinha', compact('pedidosAbertos', 'pedidosEmProducao', 'pedidosFinalizados'));
        }
}
