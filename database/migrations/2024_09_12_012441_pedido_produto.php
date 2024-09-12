<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PedidoProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_produto', function (Blueprint $table) {
            $table->id();

            $table->foreignId('produto_id')->constrained('produto')->onDelete('cascade');

            $table->foreignId('pedido_id')->constrained('pedido')->onDelete('cascade');

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
        Schema::dropIfExists('pedido_produto');
    }
}
