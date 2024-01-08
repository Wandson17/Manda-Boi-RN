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
        Schema::create('festas', function (Blueprint $table) {
            $table->id();
            $table->text('descricao');
            $table->string('endereco', 255);
            $table->timestamp("data_fim");
            $table->timestamp("data_inicio");
            $table->string('nome', 45);
            $table->integer('qntd_senha');    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('festas');
    }
};
