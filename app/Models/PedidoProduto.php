<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
    const STATUS_PEDIDO_ENVIADO = 0;
    const STATUS_PEDIDO_PREPARANDO = 1;
    const STATUS_PEDIDO_PRONTO = 2;
    const STATUS_PEDIDO_ENTREGANDO = 3;
    const STATUS_PEDIDO_ENTREGUE = 4;

    const STATUS_PAGAMENTO_PENDENTE = 0;
    const STATUS_PAGAMENTO_APROVADO = 1;

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
