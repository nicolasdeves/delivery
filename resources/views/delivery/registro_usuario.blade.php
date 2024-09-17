<div>
    <h1>Registrar</h1>
<form action="{{ route('registrar-usuario') }}" method="POST">
    @csrf
    <input type="text" name="nome" placeholder="Nome">
    <input type="text" name="email" placeholder="E-mail">
    <input type="text" name="telefone" placeholder="Telefone">
    <input type="text" name="cpf" placeholder="CPF">
    <button type="submit">Registro</button>
</form>
</div>