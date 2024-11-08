<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
    <link rel="stylesheet" href="{{ asset('css/style-relatorio.css') }}">
</head>

<body>
    <div class="container">
        <h1>Relatório de Reservas</h1>

        <form action="{{ route('gerar-relatorio-reservas') }}" method="GET">
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

        @if(isset($reservas) && $reservas->count())
        <h2>Resultados do Relatório:</h2>
        <table>
            <thead>
                <tr>
                    <th>ID da Reserva</th>
                    <th>Quantidade de Pessoas</th>
                    <th>Data da Reserva</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->id }}</td>
                    <td>{{ $reserva->quantidade_pessoas }}</td>
                    <td>{{ $reserva->data_reserva }}</td>
                    <td>
                        <span class="toggle-button" onclick="toggleInfo({{ $reserva->id }})">Mais Informações</span>
                    </td>
                </tr>
                <tr id="info-{{ $reserva->id }}" class="info-adicional" style="display: none;">
                    <td colspan="4">
                        <div style="margin-bottom: 1em;">
                            <strong>USUÁRIO:</strong>
                            <p>Nome: {{ $reserva->usuario->nome ?? 'N/A' }}</p>
                            <p>Email: {{ $reserva->usuario->email ?? 'N/A' }}</p>
                            <p>Telefone: {{ $reserva->usuario->telefone ?? 'N/A' }}</p>
                        </div>

                        <div style="margin-bottom: 1em;">
                            <strong>RESERVA:</strong>
                            <p>Quantidade de pessoas: {{ $reserva->quantidade_pessoas }}</p>
                            <p>Observação: {{ $reserva->observacao ?? 'N/A' }}</p>
                            <p>Data da reserva: {{ $reserva->data_reserva }}</p>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @elseif(isset($reservas))
        <p>Nenhuma reserva encontrada para os filtros aplicados.</p>
        @endif
    </div>

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
    </script>

</body>

</html>