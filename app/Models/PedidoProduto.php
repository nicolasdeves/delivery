<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
    protected $table = 'pedido_produto';

    protected $fillable = [
        'produto_id',
        'pedido_id',
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id');
    }
}
