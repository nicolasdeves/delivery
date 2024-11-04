<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos abertos</title>
    <link rel="icon" href="../images/laporto-icon.ico">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Nerko+One&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style-adicionar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
@include('templates.header')


<div class="container">
    <h1>Pedidos</h1>
    
    <div class="row">
        <div class="col-md-4">
            <h2>Pedidos Abertos</h2>
            <div class="border p-3">
                @foreach($pedidosAbertos as $pedido)
                    <div class="pedido p-2 mb-2 border rounded">
                        <p>ID: {{ $pedido->id }}</p>
                        @foreach($pedido as $item)
                            <p>{{ $item->pedidoProduto->produto->nome }}</p>
                            <br>
                            <p>{{ $item->pedidoProduto->produto->descricao }}</p>
                        @endforeach    
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-md-4">
            <h2>Em Preparação</h2>
            <div class="border p-3">
                @foreach($pedidosEmProducao as $pedido)
                    <div class="pedido p-2 mb-2 border rounded">
                        <p>ID: {{ $pedido->id }}</p>
                        <p>Detalhes: {{ $pedido->detalhes }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-md-4">
            <h2>Finalizados</h2>
            <div class="border p-3">
                @foreach($pedidosFinalizados as $pedido)
                    <div class="pedido p-2 mb-2 border rounded">
                        <p>ID: {{ $pedido->id }}</p>
                        <p>Detalhes: {{ $pedido->detalhes }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@include('templates.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>