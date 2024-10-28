<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Endereço</title>
</head>
<body>
    <h1>Editar Endereço:</h1>

    <form action="{{ route('atualizar-endereco', $endereco->id) }}" method="POST">
        @csrf 
        @method('PUT') 

        <input type="hidden" name="id" value="{{$endereco->id}}">

        <div>
            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep" value="{{ $endereco->cep }}" required>
        </div>

        <div>
            <label for="rua">Rua:</label>
            <input type="text" id="rua" name="rua" value="{{ $endereco->rua }}" required>
        </div>

        <div>
            <label for="bairro">Bairro:</label>
            <input type="text" id="bairro" name="bairro" value="{{ $endereco->bairro }}">
        </div>

        <div>
            <label for="numero">Número:</label>
            <input type="text" id="numero" name="numero" value="{{ $endereco->numero }}">
        </div>

        <div>
            <button type="submit">Salvar</button>
        </div>
    </form>

    <a href="{{ route('lista-enderecos') }}">Voltar para lista de endereços</a>
</body>
</html>
