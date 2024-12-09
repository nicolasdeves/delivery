<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Mesa</title>
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
    <h2 class="mt-3 shadows-into-light-regular">Reserva de Mesa</h2>
    <form action="{{ route('registrar-reserva-mesa') }}" class="lora-font" method="POST">
        @csrf
        <label for="quantidade_pessoas">Quantidade de Pessoas:</label>
        <input type="number" id="quantidade_pessoas" name="quantidade_pessoas" min="1" required>

        <label for="data_reserva">Data da Reserva:</label>
        <input type="date" id="data_reserva" name="data_reserva" required>

        <label for="observacao">Observação:</label>
        <input type="text" id="observacao" name="observacao">

        <button type="submit" style="justify-content: center;">Reservar Mesa</button>
    </form>

    <a href="{{ route('lista-reservas-mesa') }}" class="lora-font">
        <button>Minhas reservas</button>
    </a>

    <div class="fixed-bottom">
        @include('templates.footer')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>