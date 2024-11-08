<h1>Reservas</h1>
<table>
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
            <button>Nova reserva</button>
        </a>

    </tbody>
</table>
