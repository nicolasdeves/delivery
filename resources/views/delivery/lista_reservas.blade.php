<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Reservas</title>
    <link rel="icon" href="../../images/laporto-icon.ico">
    <link rel="stylesheet" href="{{ asset('css/style-relatorio.css') }}">
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
    <div class="container">
        <h1 class="shadows-into-light-regular">Reservas</h1>
        <table class=" lora-font">
            <thead>
                <tr>
                    <th>Quantidade de pessoas</th>
                    <th>Observação</th>
                    <th>Data da reserva</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->quantidade_pessoas }}</td>
                    <td>{{ $reserva->observacao ?? 'N/A' }}</td>
                    <td>{{ $reserva->data_reserva }}</td>
                    <td>
                        <a href="{{ route('editar-reserva', $reserva->id) }}">
                            <button>Editar reserva</button>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('cancelar-reserva', $reserva->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza que deseja cancelar esta reserva?')">Cancelar reserva</button>
                        </form>
                    </td>
                </tr>

                @endforeach

                <a href="{{ route('reserva-mesa') }}">
                    <button class="botao">Nova reserva</button>
                </a>

            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>