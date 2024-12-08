<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\MetodoPagamento;
use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\Produto;
use App\Models\Pagamento;
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

        $metodos_pagamento = MetodoPagamento::all();

        $usuario = Auth::user();
        $enderecos = $usuario->enderecos;

        return view('delivery/inicio_delivery', compact('produtos', 'burgs', 'burgsComBatata', 'entradas', 'rangos', 'drinks', 'usuario', 'enderecos', 'metodos_pagamento'));
    }

    public function finalizarPedido(Request $request)
    {
        $valorTotal = 0;
        $usuario = Auth::user();

        if($request->endereco['endereco_id']) {
            $this->atualizarEndereco($request->endereco);
        } else {
            $endereco = Endereco::create([
                'rua'           => $request->endereco['rua'],
                'numero'        => $request->endereco['numero'],
                'bairro'        => $request->endereco['bairro'],
                'cep'           => $request->endereco['cep'],
                'complemento'   => $request->endereco['complemento'],
                'usuario_id'    => $usuario->id,
                'nome'          => $request->endereco['rua'] . ', ' . $request->endereco['numero']

            ]);
        }

        foreach ($request->carrinho as $item) {
            $idProduto = $item['id'];
            $produto = Produto::where('id', $idProduto)->first();

            $valorTotal += $produto->preco;
        }

        $metodoPagamento = json_decode($request->metodoPagamento, true);

        $pagamento = Pagamento::create([
            'descricao' => $metodoPagamento['descricao'],
            'metodo_pagamento_id' => $metodoPagamento['id'],
        ]);

        $pedido = Pedido::create([
            'status_pedido' => Pedido::STATUS_PEDIDO_ENVIADO,
            'status_pagamento' => Pedido::STATUS_PAGAMENTO_PENDENTE,
            'valor_total' => $valorTotal,
            'valor_pago' => 0,
            'taxa_entrega_id' => 1,
            'pagamento_id' => $pagamento->id,
            'usuario_id' => $usuario->id,
            'endereco_id' => $request->endereco['endereco_id'] ? $request->endereco['endereco_id'] : $endereco->id,
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

        $this->mensagem('Seu pedido foi recebido com sucesso!');

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
        Endereco::where('id', $endereco['endereco_id'])->update([
            'rua' => $endereco['rua'],
            'numero' => $endereco['numero'],
            'bairro' => $endereco['bairro'],
            'cep' => $endereco['cep'],
        ]);
    }

    public static function mensagem($mensagem) {
        //mandar mensagem no WhatsApp pelo Twilio -> é trial, só funciona com números cadastrados, ou seja, precisamos cadastrar os números dos "clientes" do site do Twilio -> ler o qr code
        try {
            $sid = config('services.twilio.sid');
            $token = config('services.twilio.token');

            $client = new Client($sid, $token);

            // Mensagm de confirmação para o cliente
            $message = $client->messages->create(
                'whatsapp:+555196705389', // Não pode ter o 9 adicional (+5551XXXXXXXX)
                [
                    'from' => 'whatsapp:+14155238886', // Número Twilio de teste
                    'body' => $mensagem
                ]
            );

        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
}
