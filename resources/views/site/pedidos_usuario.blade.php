<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>

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

    <link rel="stylesheet" href="{{ asset('css/style-relatorio.css') }}">
</head>

<body>
    @include('templates.header')
    <br>
    <br>

    <div class="container">
        <h2 class=shadows-into-light-regular>Pedidos:</h2>
        <table>
            <thead>
                <tr>
                    <th>ID do Pedido</th>
                    <th>Valor</th>
                    <th>Data</th>
                    <th>Endereço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $pedido)
                {{ \Log::info($pedido) }}
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->valor_total }}</td>
                    <td>{{ $pedido->created_at->format('d/m/Y') }}</td>
                    <td>{{ $pedido->endereco->nome}}</td>
                    <td>
                        <span class="toggle-button" onclick="toggleInfo({{ $pedido->id }})">Mais Informações</span>
                    </td>
                </tr>

                <tr id="info-{{ $pedido->id }}" class="info-adicional" style="display: none;">
                    <td colspan="4">
                        <div style="margin-bottom: 1em;">
                            @foreach($pedido->pedidoProduto as $pedidoProduto)
                            <p>Produto: {{ $pedidoProduto->produto->nome }}</p>
                            <p>Valor: {{ $pedidoProduto->produto->preco }}</p>
                            @endforeach
                        </div>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>

<script>
    function toggleInfo(reservaId) {
        var infoRow = document.getElementById('info-' + reservaId);
        if (infoRow.style.display === 'none' || infoRow.style.display === '') {
            infoRow.style.display = 'table-row';
        } else {
            infoRow.style.display = 'none';
        }
    }
    window.onload = function() {
        var infoRows = document.getElementsByClassName('info-adicional');
        for (var i = 0; i < infoRows.length; i++) {
            infoRows[i].style.display = 'none';
        }
    }
    document.addEventListener('DOMContentLoaded', function() {
        const now = new Date();

        function formatDate(date) {
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            const hours = String(date.getHours()).padStart(2, '0');
            const minutes = String(date.getMinutes()).padStart(2, '0');
            return `${year}-${month}-${day}T${hours}:${minutes}`;
        }

        const startOfDay = new Date(now.setHours(0, 0, 0, 0));
        const formattedStartOfDay = formatDate(startOfDay);

        const endOfDay = new Date(new Date().setHours(23, 59, 0, 0));
        const formattedEndOfDay = formatDate(endOfDay);

        document.getElementById('data_inicial').value = formattedStartOfDay;
        document.getElementById('data_final').value = formattedEndOfDay;
    });
</script>