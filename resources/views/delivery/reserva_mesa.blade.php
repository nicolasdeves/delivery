<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Mesa</title>
    <link rel="stylesheet" href="{{ asset('css/style-reserva.css') }}">
</head>

<body>
    <h2>Reserva de Mesa</h2>
    <form action="{{ route('registrar-reserva-mesa') }}" method="POST">
        @csrf
        <label for="quantidade_pessoas">Quantidade de Pessoas:</label>
        <input type="number" id="quantidade_pessoas" name="quantidade_pessoas" min="1" required>

        <label for="data_reserva">Data da Reserva:</label>
        <input type="date" id="data_reserva" name="data_reserva" required>

        <label for="observacao">Observação:</label>
        <input type="text" id="observacao" name="observacao" required>

        <button type="submit">Reservar Mesa</button>
    </form>

    <a href="{{ route('lista-reservas-mesa') }}">
        <button>Minhas reservas</button>
    </a>
</body>

</html>