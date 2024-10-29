<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Reserva;

class RelatorioController extends Controller
{

    public function relatorioPedidos()
    {
        $usuarios = Usuario::all();
        return view('adm/relatorio_pedidos', compact('usuarios'));
    }

    public function gerarRelatorioPedidos(Request $request){

        $usuarios = Usuario::all();

        $request->validate([
            'data_inicial' => 'required|date',
            'data_final' => 'required|date|after_or_equal:data_inicial',
        ]);

        $dataInicial = $request->input('data_inicial');
        $dataFinal = $request->input('data_final');

        $pedidos = Pedido::with('usuario')
        ->where('created_at', '>=', $dataInicial)
        ->where('created_at', '<=', $dataFinal);

        if ($request->has('usuario') && !empty($request->usuario)) {
            $pedidos->where('usuario_id', $request->usuario);
        }

        $pedidos = $pedidos->get();

        return view('adm/relatorio_pedidos', compact('pedidos', 'usuarios'));
    }

    public function relatorioReservas(){
        $usuarios = Usuario::all();

        return view('adm/relatorio_reservas', compact('usuarios'));
    }

    public function gerarRelatorioReservas(Request $request){

        $usuarios = Usuario::all();

        $request->validate([
            'data_inicial' => 'required|date',
            'data_final' => 'required|date|after_or_equal:data_inicial',
        ]);

        $dataInicial = $request->input('data_inicial');
        $dataFinal = $request->input('data_final');

        $reservas = Reserva::with('usuario')
        ->where('data_reserva', '>=', $dataInicial)
        ->where('data_reserva', '<=', $dataFinal);

        if ($request->has('usuario') && !empty($request->usuario)) {
            $reservas->where('usuario_id', $request->usuario);
        }

        $reservas = $reservas->get();

        return view('adm/relatorio_reservas', compact('reservas', 'usuarios'));
    }
}
