<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function registroUsuario()
    {
        return view('delivery/registro_usuario');
    }

    public function registrar(Request $request){
        $usuario = Usuario::create([
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'telefone' => $request->input('telefone'),
            'cpf' => $request->input('cpf')
        ]);
        
        return redirect()->route('inicio');
    }
}
