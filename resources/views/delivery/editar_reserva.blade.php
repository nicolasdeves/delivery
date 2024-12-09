<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Reservas</title>
    <link rel="icon" href="../../images/laporto-icon.ico">
    <link rel="stylesheet" href="{{ asset('css/style-reserva.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Nerko+One&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    @include('templates.header')
    <h1 class="shadows-into-light-regular">Reservas</h1>
    <table>
        <tbody>
            <form action="{{ route('atualizar-reserva', $reserva->id) }}" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="id" value="{{$reserva->id}}">


                <label for="quantidade_pessoas">Quantidade de pessoas:</label>
                <input type="number" id="cep" name="quantidade_pessoas" value="{{ $reserva->quantidade_pessoas }}" required>



                <label for="observacao">Observação:</label>
                <input type="text" id="observacao" name="observacao" value="{{ $reserva->observacao }}" required>



                <label for="data_reserva">Data da Reserva:</label>
                <input type="date" id="data_reserva" name="data_reserva" value="{{ $reserva->data_reserva }}" required>



                <button type="submit">Salvar</button>

            </form>

            <a href="{{ route('lista-reservas-mesa') }}">Voltar para lista de reservas</a>
        </tbody>
    </table>

</body>

</html>