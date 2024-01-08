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
        Schema::create('corridas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 45);
            $table->timestamp("data_inicio");
            $table->timestamp("data_fim");
            $table->string("endereco", 255);
            $table->text("descricao");
            $table->integer("qntd_senha");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corridas');
    }
};
