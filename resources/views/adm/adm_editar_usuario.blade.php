<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style-edit-user.css') }}">
</head>

<body>
    <div class="container">
        <h1>Editar Usuário: {{ $user->name }}</h1>

        <form action="{{ route('atualizar-usuario', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="{{ $user->nome }}" required>
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" required>
            </div>

            <div>
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" value="{{ $user->telefone }}">
            </div>

            <div>
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" value="{{ $user->cpf }}">
            </div>

            <div>
                <button type="submit">Salvar</button>
            </div>
        </form>

        <a href="{{ route('gerenciar-usuarios') }}">Voltar para lista de usuários</a>
    </div>
</body>

</html>