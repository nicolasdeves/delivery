<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
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

        $usuario = Auth::user();
        $enderecos = $usuario->enderecos;

        \Log::info("Usuário: " . $usuario);
        \Log::info("Endereços: " . $enderecos);

        return view('delivery/inicio_delivery', compact('produtos', 'burgs', 'burgsComBatata', 'entradas', 'rangos', 'drinks', 'usuario', 'enderecos'));
    }

    public function finalizarPedido(Request $request)
    {
        $valorTotal = 0;
        $usuario = Auth::user();

        $this->atualizarEndereco($request->endereco);

        foreach ($request->carrinho as $item) {
            $idProduto = $item['id'];
            $produto = Produto::where('id', $idProduto)->first();

            $valorTotal += $produto->preco;
        }

        $pedido = Pedido::create([
            'status_pedido' => Pedido::STATUS_PEDIDO_ENVIADO,
            'status_pagamento' => Pedido::STATUS_PAGAMENTO_PENDENTE,
            'valor_total' => $valorTotal,
            'valor_pago' => 0,
            'taxa_entrega_id' => 1,
            'pagamento_id' => 1,
            'usuario_id' => $usuario->id,
            'endereco_id' => $request['endereco']['id'],
            'observacao' => $request['observacao']

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

        //mandar mensagem no WhatsApp pelo Twilio -> é trial, só funciona com números cadastrados, ou seja, precisamos cadastrar os números dos "clientes" do site do Twilio -> ler o qr code
        try {
            $sid = config('services.twilio.sid');
            $token = config('services.twilio.token');

            \Log::info("SID: " . $sid);
            \Log::info("TOKEN: " . $token);

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

            // Mensagm de confirmação para o cliente
            $message = $client->messages->create(
                'whatsapp:+555196705389', // Não pode ter o 9 adicional (+5551XXXXXXXX)
                [
                    'from' => 'whatsapp:+14155238886', // Número Twilio de teste
                    'body' => 'Restaurante recebeu seu pedido.'
                ]
            );

        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }

        redirect()->route('inicio');

        return response()->json([
            'message' => 'Pedido recebido com sucesso!' . $pedido->id,
            'data' => $request->all()
        ]);
    }

    public function visualizarModal()
    {
        return view('delivery/modal_confirmacao');
    }

    public function atualizarEndereco($endereco)
    {
        Endereco::where('id', $endereco['id'])->update([
            'rua' => $endereco['rua'],
            'numero' => $endereco['numero'],
            'bairro' => $endereco['bairro'],
            'cep' => $endereco['cep'],
            'complemento' => $endereco['complemento'],
            'nome' => $endereco['nome'],
        ]);
    }
}
