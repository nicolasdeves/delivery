<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class GerenciarUsuariosController extends Controller
{
    public function listarUsuarios(){
        $users = Usuario::all();
        return view('adm/gerencia_usuarios', compact('users'));
    }

    public function deletarUsuario($id){
        $user = Usuario::findOrFail($id); 
    $user->delete(); 

    return redirect()->route('gerenciar-usuarios')->with('success', 'Usuário excluído com sucesso!');
    }

    public function editarUsuario($id){
        $user = Usuario::findOrFail($id);
        return view('adm/adm_editar_usuario', compact('user'));
    }

    public function atualizarUsuario(Request $request, $id){
        $user = Usuario::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('gerenciar-usuarios')->with('success', 'Usuário atualizado com sucesso!');
    }
}
