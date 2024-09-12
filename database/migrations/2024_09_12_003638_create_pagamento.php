<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamento', function (Blueprint $table) {
            $table->id();

            $table->string('descricao', 50);

            $table->boolean('confirmado')->default(false);

            $table->foreignId('metodo_pagamento_id')->constrained('metodo_pagamento')->onDelete('cascade');

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
        Schema::dropIfExists('pagamento');
    }
}
