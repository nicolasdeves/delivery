<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        <h2>Endereços:</h2>
        <table>
            <thead>
                <tr>
                    <th>Rua</th>
                    <th>Número</th>
                    <th>Bairoo</th>
                    <th>CEP</th>
                    <th>Complemento</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                @foreach($enderecos as $endereco)
                <tr>
                    <td>{{ $endereco->rua }}</td>
                    <td>{{ $endereco->numero }}</td>
                    <td>{{ $endereco->bairro }}</td>
                    <td>{{ $endereco->cep }}</td>
                    <td>{{ $endereco->complemento }}</td>
                    <td>
                        <span class="toggle-button" onclick="excluirEndereco({{ $endereco->id }})">Excluir</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>

<script>
   function excluirEndereco(id) {
    fetch('/usuario/excluir-endereco', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            endereco_id: id
        })
    })
    .then(response => response.json())
    }

</script>
