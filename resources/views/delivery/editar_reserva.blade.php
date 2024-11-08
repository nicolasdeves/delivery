<h1>Reservas</h1>
<table>
    <tbody>
        <form action="{{ route('atualizar-reserva', $reserva->id) }}" method="POST">
            @csrf 
            @method('PUT') 

            <input type="hidden" name="id" value="{{$reserva->id}}">

        <div>
            <label for="quantidade_pessoas">Quantidade de pessoas:</label>
            <input type="number" id="cep" name="quantidade_pessoas" value="{{ $reserva->quantidade_pessoas }}" required>
        </div>

        <div>
            <label for="observacao">Observação:</label>
            <input type="text" id="observacao" name="observacao" value="{{ $reserva->observacao }}" required>
        </div>

        <div>
            <label for="data_reserva">Data da Reserva:</label>
            <input type="date" id="data_reserva" name="data_reserva" value="{{ $reserva->data_reserva }}" required>
        </div>

        <div>
            <button type="submit">Salvar</button>
        </div>
    </form>

    <a href="{{ route('lista-reservas-mesa') }}">Voltar para lista de reservas</a>
    </tbody>
</table>
