<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class CardapioController extends Controller
{
    public function adicionarProdutoCardapio(Request $request)
    {
        $caminhoImagem = $request->file('imagem')->store('images', 'public');

        Produto::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'imagem' => $caminhoImagem,
            'tipo_produto_id' => $request->tipo_produto_id,
        ]);

        return redirect()->route('lista-cardapio')->with('success', 'Produto adicionado com sucesso!');
    }

    public function excluirProdutoCardapio($id)
    {
        $produto = Produto::find($id);
        $produto->delete();

        return redirect()->route('lista-cardapio');
    }

    public function editarProdutoCardapio(Request $request, $id)
    {

        $caminhoImagem = $request->hasFile('imagem')
            ? $request->file('imagem')->store('images', 'public')
            : null;

        if($caminhoImagem == null){
            $produto = Produto::find($id);
            $caminhoImagem = $produto->imagem;
        }

        $produto = Produto::find($id);
        $produto->update([
            'nome'            => $request->nome,
            'descricao'       => $request->descricao,
            'preco'           => $request->preco,
            'imagem'          => $caminhoImagem,
            'tipo_produto_id' => $request->tipo_produto_id,
        ]);

        return redirect()->route('lista-cardapio');
    }

    public function cardapio()
    {
        $produtos = Produto::all();

        $burgs = Produto::where('tipo_produto_id', 1)->get();
        $burgsComBatata = Produto::where('tipo_produto_id', 2)->get();
        $entradas = Produto::where('tipo_produto_id', 3)->get();
        $rangos = Produto::where('tipo_produto_id', 4)->get();
        $drinks = Produto::where('tipo_produto_id', 5)->get();

        return view('site.cardapio', compact('produtos', 'burgs', 'burgsComBatata', 'entradas', 'rangos', 'drinks'));
    }

    public function cardapio_burg()
    {
        return view('site.cardapio_burg');
    }

    public function cardapio_burg_batata()
    {
        return view('site.cardapio_burg_batata');
    }

    public function cardapio_entrada()
    {
        return view('site.cardapio_entrada');
    }

    public function cardapio_rango()
    {
        return view('site.cardapio_rango');
    }

    public function cardapio_drink()
    {
        return view('site.cardapio_drink');
    }
}
