<form action={{ route ('autenticar')}} method="POST">
    @csrf
    <input type="text" name="usuario" placeholder="Usuário">
    <input type="password" name="senha" placeholder="Senha">
    <button type="submit">Entrar</button>
</form>