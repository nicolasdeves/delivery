<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style-relatorio.css') }}">
</head>

<body>
    <div class="container">
        <h1>Relatório de Pedidos</h1>

        <form action="{{ route('gerar-relatorio-pedidos') }}" method="GET">
            <div>
                <label for="data_inicial">Data Inicial:</label>
                <input type="date" id="data_inicial" name="data_inicial" required>
            </div>

            <div>
                <label for="data_final">Data Final:</label>
                <input type="date" id="data_final" name="data_final" required>
            </div>

            <div>
                <label for="usuario">Usuário:</label>
                <select id="usuario" name="usuario">
                    <option value="">Todos</option>
                    @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->nome }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit">Gerar Relatório</button>
        </form>

        @if(isset($pedidos) && $pedidos->count())
        <h2>Resultados do Relatório:</h2>
        <table>
            <thead>
                <tr>
                    <th>ID do Pedido</th>
                    <th>Usuário</th>
                    <th>Valor</th>
                    <th>Status Pedido</th>
                    <th>Status Pagamento</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->usuario->nome ?? 'N/A' }}</td>
                    <td>R${{ $pedido->valor_pago }}</td>

                    <td>
                        @switch($pedido->status_pedido)
                        @case(0) Enviado @break
                        @case(1) Preparando @break
                        @case(2) Pronto @break
                        @case(3) Entregando @break
                        @case(4) Entregue @break
                        @default Status desconhecido
                        @endswitch
                    </td>

                    <td>
                        @switch($pedido->status_pagamento)
                        @case(0) Pendente @break
                        @case(1) Pago @break
                        @default Status desconhecido
                        @endswitch
                    </td>
                    <td>{{ $pedido->created_at }}</td>
                    <td>
                        <span class="toggle-button" onclick="toggleInfo({{ $pedido->id }})">Mais Informações</span>
                    </td>
                </tr>
                <tr id="info-{{ $pedido->id }}" class="info-adicional" style="display: none;">
                    <td colspan="7">
                        <div style="margin-bottom: 1em;">
                            <strong>USUÁRIO:</strong>
                            <p>Nome: {{ $pedido->usuario->nome ?? 'N/A' }}</p>
                            <p>Email: {{ $pedido->usuario->email ?? 'N/A' }}</p>
                            <p>Telefone: {{ $pedido->usuario->telefone ?? 'N/A' }}</p>
                        </div>

                        <div>
                            <strong>PEDIDO:</strong>
                            @if($pedido->pedidoProduto && $pedido->pedidoProduto->count())
                            <ul>
                                @foreach($pedido->pedidoProduto as $pedidoProduto)
                                <li>
                                    {{ $pedidoProduto->produto->nome }}
                                    <br>
                                    Descrição: {{ $pedidoProduto->produto->descricao }}
                                    <br>
                                    Tipo do produto: {{ $pedidoProduto->produto->tipoProduto->descricao }}
                                    <br>
                                    Preço: R${{ $pedidoProduto->produto->preco }}
                                </li>
                                @endforeach
                            </ul>
                            @else
                            <p>Nenhum item encontrado para este pedido.</p>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @elseif(isset($pedidos))
        <p>Nenhum pedido encontrado para os filtros aplicados.</p>
        @endif
    </div>

    <script>
        function toggleInfo(pedidoId) {
            var infoRow = document.getElementById('info-' + pedidoId);
            if (infoRow.style.display === 'none' || infoRow.style.display === '') {
                infoRow.style.display = 'table-row';
            } else {
                infoRow.style.display = 'none';
            }
        }
    </script>

</body>

</html>