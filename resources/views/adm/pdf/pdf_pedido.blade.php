<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .pedido {
            border: 1px solid #000;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Detalhes do Pedido</h1>
    <p><strong>ID do Pedido:</strong> {{ $pedido->id }}</p>
    <h2>Produtos</h2>
    @foreach($pedido->pedidoProduto as $item)
        <div class="pedido">
            <p><strong>Nome:</strong> {{ $item->produto->nome }}</p>
            <p><strong>Descrição:</strong> {{ $item->produto->descricao }}</p>
        </div>
    @endforeach
</body>
</html>
