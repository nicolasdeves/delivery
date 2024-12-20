<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Produto extends Model
{
    protected $table = 'produto';

    protected $fillable = [
    'nome',
    'descricao',
    'preco',
    'imagem',
    'tipo_produto_id'
    ];

    public function tipoProduto()
    {
        return $this->belongsTo(TipoProduto::class, 'tipo_produto_id');
    }

}
