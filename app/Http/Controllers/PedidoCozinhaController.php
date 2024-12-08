<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use PDF;

class PedidoCozinhaController extends Controller
{
    public function pedidoCozinha()
    {
        $pedidosAbertos = Pedido::where('status_pedido', '0')->get();
        $pedidosEmProducao = Pedido::where('status_pedido', '1')->get();
        $pedidosEmEntrega = Pedido::where('status_pedido', '3')->get();
        $pedidosFinalizados = Pedido::where('status_pedido', '2')
        ->where('created_at', '>=', date('Y-m-d 00:00:00'))
        ->get();

        return view('adm/pedidos_cozinha', compact('pedidosAbertos', 'pedidosEmProducao', 'pedidosFinalizados', 'pedidosEmEntrega'));
    }

    public function atualizarStatusPedido($id)
    {
        $pedido = Pedido::findOrFail($id);

        if ($pedido->status_pedido == 0) {
            $pedido->status_pedido = 1;
            DeliveryController::mensagem('Seu pedido está sendo preparado!');
        } elseif ($pedido->status_pedido == 1) {
            $pedido->status_pedido = 3;
            DeliveryController::mensagem('Seu pedido está sendo enviado!');
        } elseif ($pedido->status_pedido == 3) {
            $pedido->status_pedido = 2;
            DeliveryController::mensagem('Seu pedido foi entregue!');
        } elseif ($pedido->status_pedido == 2) {
            $pedido->status_pedido = 4;
        }

        $pedido->save();

        return redirect()->back()->with('success', 'Status do pedido atualizado com sucesso!');
    }
    public function gerarPDF($id)
    {
        $pedido = Pedido::with('pedidoProduto.produto')->findOrFail($id);

        $pdf = PDF::loadView('adm.pdf.pdf_pedido', compact('pedido'));

        return $pdf->stream("pedido_$id.pdf");
    }
}
