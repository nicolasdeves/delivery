<!DOCTYPE html>

<h1>Lista de Endereços</h1>

    <button onclick="window.location.href='{{ route('adicionar-endereco') }}'">Adicionar endereço</button>


<ul id="user-list">
    @foreach($enderecos as $endereco)
    <li>
        <span>{{ $endereco->cep }}</span>
        <span>{{ $endereco->rua }}</span>
        <span>{{ $endereco->bairro }}</span>
        <span>{{ $endereco->numero }}</span>
         <button onclick="window.location.href='{{ route('editar-endereco', $endereco->id) }}'">Editar</button> 

         <form action="{{ route('deletar-endereco', $endereco->id) }}" method="POST" style="display:inline;">
        @csrf 
            @method('DELETE') 

            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
        </form>
    </li>
    @endforeach
</ul>