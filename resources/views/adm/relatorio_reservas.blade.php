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
                <input type="datetime-local" id="data_inicial" name="data_inicial" required>
            </div>

            <div>
                <label for="data_final">Data Final:</label>
                <input type="datetime-local" id="data_final" name="data_final" required>
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
        document.addEventListener('DOMContentLoaded', function () {
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

</body>

</html>