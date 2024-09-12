<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngrediente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingrediente', function (Blueprint $table) {
            $table->id();

            $table->string('descricao', 50);

            $table->double('preco', 8, 2)->unsigned()->nullable(); //importante para saber preço de custo de um produto e relatório de gastos mensais

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
        Schema::dropIfExists('ingrediente');
    }
}
