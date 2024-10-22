<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function registroUsuario()
    {
        return view('delivery/registro_usuario');
    }

    public function registrar(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuario,email',
            'telefone' => 'required|string|max:15|unique:usuario,telefone',
            'cpf' => 'required|string|max:14|unique:usuario,cpf',
        ]);

        $usuario = Usuario::create([
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'telefone' => $request->input('telefone'),
            'cpf' => $request->input('cpf')
        ]);
        
        return redirect()->route('delivery/login');
    }

    public function login()
    {
        return view('delivery/login_user');
    }

    public function autenticarUsuario(Request $request)
    {
        if($request->cpf){
            $usuario= Usuario::where('cpf', $request->cpf)->first();
            if($usuario){
                Auth::login($usuario);
                return redirect()->route('inicio-delivery');
            }
        }
/*         $erro = 'Usuário ou senha inválidos';
 */        return view('delivery/login_user');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
