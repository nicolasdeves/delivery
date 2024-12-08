<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="{{ asset('css/style-users.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Nerko+One&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style-menu.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    @include('templates.header')

    <br>
    <br>

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
