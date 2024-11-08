<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="{{ asset('css/style-users.css') }}">
</head>

<body>
    <h1>Lista de Usuários</h1>

    <button class="button" onclick="window.location.href='{{ route('registro-usuario') }}'">Cadastrar Usuário</button>

    <ul id="user-list">
        @foreach($users as $user)
        <li>
            <span>{{ $user->nome }}</span>
            <span>{{ $user->email }}</span>
            <span>{{ $user->telefone }}</span>
            <span>{{ $user->cpf }}</span>
            <div class="action-buttons">
                <button class="edit-button" onclick="window.location.href='{{ route('editar-usuario', $user->id) }}'">Editar</button>

                <form action="{{ route('deletar-usuario', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                </form>
            </div>
        </li>
        @endforeach
    </ul>
</body>

</html>