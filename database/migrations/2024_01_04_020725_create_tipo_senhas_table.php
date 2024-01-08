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
        Schema::create('tipos_senhas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoria_senhas_id');
            $table->foreign('categoria_senhas_id')->references('id')
                ->on('categoria_senhas')->onDelete('cascade');
            $table->unsignedBigInteger('corrida_id');
            $table->foreign('corrida_id')->references('id')
                ->on('corridas')->onDelete('cascade');
            $table->integer('de')->nullable(false);
            $table->integer('ate')->nullable(false);
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
