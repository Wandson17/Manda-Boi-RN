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
        Schema::create('ingressos_festas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('festa_id');
            $table->unsignedBigInteger('forma_pagamento_id');
            $table->unsignedBigInteger('ingresso_id');

            $table->foreign('ingresso_id')->references('id')->on('ingressos')->onDelete('cascade');
            $table->foreign('forma_pagamento_id')->references('id')->on('formas_pagamentos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('festa_id')->references('id')->on('festas')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingressos_festas');
    }
};
