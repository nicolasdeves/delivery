<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;

class ReservaMesaController extends Controller
{
    public function reservaMesa()
    {
        return view('delivery/reserva_mesa');
    }
    public function registrarReservaMesa(Request $request){

        $userId = auth()->id();

        $request->validate([
            'quantidade_pessoas' => 'required',
            'data_reserva' => 'required|date|after_or_equal:today',
        ]);

        Reserva::create([
            'quantidade_pessoas' => $request->quantidade_pessoas,
            'data_reserva' => $request->data_reserva,
            'usuario_id' => $userId,
            'observacao' => $request->observacao,
        ]);

        return redirect()->route('inicio-delivery')->with('message', 'Reserva realizada com sucesso!');
    }
    public function listarReservasMesa(){
        $userId = auth()->id();
        $reservas = Reserva::where('usuario_id', $userId)->get();
        return view('delivery/lista_reservas', ['reservas' => $reservas]);
    }
    public function editarReserva(Request $request){
        $reserva = Reserva::find($request->id);
        return view('delivery/editar_reserva', ['reserva' => $reserva]);
    }
    public function atualizarReserva(Request $request){

        $request->validate([
            'data_reserva' => 'required|date|after_or_equal:today',
        ]);

        $reserva = Reserva::find($request->id);
        $reserva->quantidade_pessoas = $request->quantidade_pessoas;
        $reserva->data_reserva = $request->data_reserva;
        $reserva->observacao = $request->observacao;
        $reserva->save();
        return redirect()->route('lista-reservas-mesa')->with('message', 'Reserva atualizada com sucesso!');
    }
    public function cancelarReserva(Request $request){
        $reserva = Reserva::find($request->id);
        $reserva->delete();
        return redirect()->route('lista-reservas-mesa')->with('message', 'Reserva cancelada com sucesso!');
    }
}
