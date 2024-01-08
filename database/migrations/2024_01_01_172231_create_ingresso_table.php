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
        Schema::create('ingressos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('festa_id');
            $table->unsignedBigInteger('categoria_ingresso_id');
            $table->foreign('festa_id')->references('id')
                ->on('festas')->onDelete('cascade');
            $table->foreign('categoria_ingresso_id')->references('id')
                ->on('categorias_ingressos')->onDelete('cascade');
            $table->double('preco', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingressos');
    }
};
