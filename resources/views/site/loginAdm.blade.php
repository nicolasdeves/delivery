<div>
    <h1>Login</h1>
<form action={{ route ('autenticar')}} method="POST">
    @csrf
    <input type="text" name="usuario" placeholder="Usuário">
    <input type="password" name="senha" placeholder="Senha">
    <button type="submit">Entrar</button>
</form>
@if($erro != '')
        <div style="color: red;">{{ $erro }}</div>
    @endif
</div>