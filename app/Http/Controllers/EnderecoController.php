<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Endereco;

class EnderecoController extends Controller
{
    public function adicionarEndereco()
    {
        return view('delivery/adicionar_endereco');
    }
    
    public function registroEndereco(Request $request){

        $userId = auth()->id();

        $request->validate([
            'rua' => 'required|string|max:255',
            'numero' => 'required|integer',  
            'bairro' => 'required|string|max:100',
            'cep' => 'required|digits:8', 
        ]);

        Endereco::create([
            'rua' => $request->input('rua'),
            'numero' => $request->input('numero'),
            'bairro' => $request->input('bairro'),
            'cep' => $request->input('cep'),
            'usuario_id' => $userId
        ]);
        
        return redirect()->route('inicio-delivery');
    }

    public function listarEnderecos(){
        $userId = auth()->id();
        $enderecos = endereco::all()
        ->where('usuario_id', $userId);

        return view('delivery/lista_enderecos', compact('enderecos', 'userId'));
    }

    public function editarEndereco($id){
        $endereco = Endereco::FindorFail($id);
        return view('delivery/editar_endereco', compact('endereco'));
    }

    public function atualizarEndereco(Request $request){
        $endereco = Endereco::findOrFail($request->id);
        $endereco->update($request->all());

        return $this->listarEnderecos();
    }

    public function deletarEndereco(Request $request){
        $endereco = Endereco::findOrFail($request->id);
        $endereco->delete();

        return $this->listarEnderecos();
    }
}
