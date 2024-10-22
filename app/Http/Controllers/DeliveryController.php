<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{

    public function delivery()
    {
        $produtos = Produto::all();

        $burgs = Produto::where('tipo_produto_id', 1)->get();
        $burgsComBatata = Produto::where('tipo_produto_id', 2)->get();
        $entradas = Produto::where('tipo_produto_id', 3)->get();
        $rangos = Produto::where('tipo_produto_id', 4)->get();
        $drinks = Produto::where('tipo_produto_id', 5)->get();

        return view('delivery/inicio_delivery', compact('produtos', 'burgs', 'burgsComBatata', 'entradas', 'rangos', 'drinks'));
    }

    public function finalizarPedido(Request $request)
    {

        foreach ($request->carrinho as $item) {

            $id = $item['id'];
            $produto = Produto::where('id', $id)->first();

            \Log::info('Produto: ' . $produto->nome);
            //terminar função
        }

        return response()->json([
            'message' => 'Pedido recebido com sucesso!',
            'data' => $request->all()
        ]);
    }
}
