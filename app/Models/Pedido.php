<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    const STATUS_PEDIDO_ENVIADO = 0;
    const STATUS_PEDIDO_PREPARANDO = 1;
    const STATUS_PEDIDO_PRONTO = 2;
    const STATUS_PEDIDO_ENTREGANDO = 3;
    const STATUS_PEDIDO_ENTREGUE = 4;

    const STATUS_PAGAMENTO_PENDENTE = 0;
    const STATUS_PAGAMENTO_APROVADO = 1;

    protected $table = 'pedido';

    protected $fillable = [
        'status_pedido',
        'status_pagamento',
        'valor_total',
        'valor_pago',
        'taxa_entrega_id',
        'pagamento_id',
        'usuario_id',
    ];



}
