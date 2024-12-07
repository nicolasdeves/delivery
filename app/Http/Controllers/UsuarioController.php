<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Pedido;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function registroUsuario()
    {
        return view('delivery/registro_usuario');
    }

    public function registrar(Request $request)
    {

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

        return redirect()->route('login_user');
    }

    public function login()
    {
        return view('delivery/login_user');
    }

    public function autenticarUsuario(Request $request)
    {
        if ($request->cpf) {
            $usuario = Usuario::where('cpf', $request->cpf)->first();
            if ($usuario) {
                Auth::login($usuario);
                return redirect()->route('inicio-delivery');
            }
        }
        /*         $erro = 'Usuário ou senha inválidos';
 */
        return view('delivery/login_user');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function pedidosUsuario()
    {
        $pedidos = Pedido::where('usuario_id', Auth::user()->id)
        ->where('status_pedido', Pedido::STATUS_PEDIDO_ENTREGUE)
        ->with('pedidoProduto')
        ->get();

        return view('site/pedidos_usuario', compact('pedidos'));
    }

    public function enderecosUsuario()
    {
        $enderecos = Endereco::where('usuario_id', Auth::user()->id)->get();

        return view('site/enderecos_usuario', compact('enderecos'));
    }

    public function excluirEndereco(Request $request)
    {
        $endereco = Endereco::find($request->endereco_id);
        $endereco->delete();

        return redirect()->route('enderecos-usuario');
    }
}
