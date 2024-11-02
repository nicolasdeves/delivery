<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\Produto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Twilio\Rest\Client;

class DeliveryController extends Controller
{
    public function inicioDelivery()
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
        $valorTotal = 0;
        $usuario = Auth::user();

        $pedido = Pedido::create([
            'status_pedido' => Pedido::STATUS_PEDIDO_ENVIADO,
            'status_pagamento' => Pedido::STATUS_PAGAMENTO_PENDENTE,
            'valor_total' => $valorTotal,
            'valor_pago' => 0,
            'taxa_entrega_id' => 1,
            'pagamento_id' => 1,
            'usuario_id' => $usuario->id,
        ]);

        foreach ($request->carrinho as $item) {
            $idProduto = $item['id'];
            $produto = Produto::where('id', $idProduto)->first();

            PedidoProduto::create([
                'pedido_id' => $pedido->id,
                'produto_id' => $produto->id,
            ]);

            $valorTotal += $produto->preco;
        }

        //mandar mensagem no WhatsApp pelo Twilio -> é trial, só funciona com números cadastrados, ou seja, precisamos cadastrar os números dos "clientes" do site do Twilio
        try {
            $sid = env('TWILIO_ACCOUNT_SID');
            $token = env('TWILIO_AUTH_TOKEN');
            $client = new Client($sid, $token);

            //Mensagem para o restaurante
            $message = $client->messages->create(
                'whatsapp:+555196705389', // Não pode ter o 9 adicional (+5551XXXXXXXX)
                [
                    'from' => 'whatsapp:+14155238886', // Número Twilio de teste
                    'body' => 'Restaurante recebeu um novo pedido! Pedido: ' .
                    $pedido->id . ' Valor total: R$' .
                    floatval($valorTotal)
                ]
            );

            //Mensagm de confirmação para o cliente
            $message = $client->messages->create(
                'whatsapp:+555196705389', // Não pode ter o 9 adicional (+5551XXXXXXXX)
                [
                    'from' => 'whatsapp:+14155238886', // Número Twilio de teste
                    'body' => 'Restaurante recebeu seu pedido.'
                ]
            );
        }
        catch (Exception $e) {
            \Log::error("Erro ao enviar mensagem: " . $e->getMessage());
            echo "Erro: " . $e->getMessage();
        }

        return response()->json([
            'message' => 'Pedido recebido com sucesso!' . $pedido->id,
            'data' => $request->all()
        ]);
    }
}
