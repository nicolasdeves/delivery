<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - LaPorto</title>
    <link rel="icon" href="../images/laporto-icon.ico">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Nerko+One&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style-login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    <div class="login-container">
        <div class="login-box">
            <h1 class="logo shadows-into-light-regular">LaPorto</h1>
            <p class="welcome-message">Bem-vindo ao LaPorto! Faça seu registro para acessar o painel.</p>
            <form action="{{ route('registrar-usuario') }}" method="POST" class="login-form" onsubmit="return validarCPF() && validarTelefone()">
                @csrf
                <input type="text" name="nome" placeholder="Nome" required>
                <input type="text" name="email" placeholder="E-mail" required>
                <input type="text" name="telefone" id="telefone" placeholder="Telefone" required>
                <input type="text" name="cpf" id="cpf" placeholder="CPF" required>
                <button type="submit">Registro</button>
                <p class="signup-link">Já tem uma conta? <a href="{{ route('login_user')}}"> Faça login</a></p>
            </form>
            <p id="cpf-error" style="color: red; display: none;">CPF inválido. Por favor, insira um CPF válido.</p>
            <p id="telefone-error" style="color: red; display: none;">Telefone inválido. Por favor, insira um telefone válido.</p>
        </div>
    </div>

    <script src="{{ asset('js/cpf_telefone.js') }}"></script>
</body>

</html>