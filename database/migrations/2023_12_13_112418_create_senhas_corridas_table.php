<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('senhas_corridas', function (Blueprint $table) {
            $table->id();
            $table->integer("numero");
            $table->string("nome_puxador", 45);
            $table->string("apelido_puxado", 45)->nullable(true);
            $table->string("cpf_puxador", 14);
            $table->string("cavalo_puxador", 45);
            $table->string("nome_esteira", 45);
            $table->string("apelido_esteira", 45);
            $table->string("cpf_esteira", 14);
            $table->string("cidade", 45);
            $table->string("UF", 2);
            $table->string("representacao", 45);
            $table->string("status_pagamento", 45)->default("Pendente");

            $table->unsignedBigInteger('corrida_id')->unsigned();
            $table->foreign('corrida_id')->references('id')
                 ->on('corridas')->onDelete('cascade');

            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')
                 ->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('senhas_corridas');
    }
};
