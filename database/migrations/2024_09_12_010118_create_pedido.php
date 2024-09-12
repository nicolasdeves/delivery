<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->id();

            $table->integer('status_pedido')->unsigned();

            $table->integer('status_pagamento')->unsigned();

            $table->double('valor_total', 8, 2)->unsigned(); //precisa porque vai ter o valor dos produtos, taxa de entrega e possível desconto ou cupom

            $table->double('valor_pago', 8, 2)->unsigned();

            $table->foreignId('taxa_entrega_id')->constrained('taxa_entrega')->onDelete('cascade');

            $table->foreignId('pagamento_id')->constrained('pagamento')->onDelete('cascade');

            $table->foreignId('usuario_id')->constrained('usuario')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido');
    }
}
