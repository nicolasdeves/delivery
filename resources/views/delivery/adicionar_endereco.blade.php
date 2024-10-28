<div>
    <h1>Registrar</h1>
<form action="{{ route('registro-endereco') }}" method="POST">
    @csrf
    <input type="text" name="cep" placeholder="CEP">
    <input type="text" name="rua" placeholder="Rua">
    <input type="text" name="bairro" placeholder="Bairro">
    <input type="text" name="numero" placeholder="Número">
    <button type="submit">Adicionar endereço</button>
</form>
</div>
