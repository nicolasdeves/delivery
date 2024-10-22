<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
</head>
<body>
    <h1>Lista de Usuários</h1>
    <ul id="user-list">
        @foreach($users as $user)
        <li>
            <span>{{ $user->nome }}</span>
            <span>{{ $user->email }}</span>
            <span>{{ $user->telefone }}</span>
            <span>{{ $user->cpf }}</span>
            <button onclick="window.location.href='{{ route('editar-usuario', $user->id) }}'">Editar</button>

            <form action="{{ route('deletar-usuario', $user->id) }}" method="POST" style="display:inline;">
                @csrf 
                @method('DELETE') 

                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
            </form>
        </li>
        @endforeach
    </ul>
</body>
</html>
