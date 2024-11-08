<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início - LaPorto</title>
    <link rel="icon" href="../../images/laporto-icon.ico">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Nerko+One&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style-menu.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    @include('templates.header')

    <div class="container lora-font">
        <div class="menu">
            <div class="menu-item">
                <h3>Adicionar Item ao Cardápio</h3>
                <a href="adicionar-cardapio">Adicionar</a>
            </div>
            <div class="menu-item">
                <h3>Editar/Excluir item ao Cardápio</h3>
                <a href="editar-excluir-cardapio">Editar</a>
            </div>
            <div class="menu-item">
                <h3>Listar Itens do Cardápio</h3>
                <a href="lista-cardapio">Listar</a>
            </div>
            <div class="menu-item">
                <h3>Gerenciar Usuários</h3>
                <a href="gerenciar-usuarios">Usuários</a>
            </div>
            <div class="menu-item">
                <h3>Reserva de Mesas</h3>
                <a href="#">Mesas</a>
            </div>
            <div class="menu-item">
                <h3>Relatório de pedidos</h3>
                <a href="{{route('relatorio-pedidos')}}">Pedidos</a>
            </div>
            <div class="menu-item">
                <h3>Relatório de reservas</h3>
                <a href="{{route('relatorio-reservas')}}">Reservas</a>
            </div>
            <div class="menu-item">
                <h3>Cozinha</h3>
                <a href="{{route('pedidos-cozinha')}}">Cozinha</a>
            </div>
        </div>
    </div>

    @include('templates.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
</html>