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
        Schema::create('senhas_festas', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->string('status_pagamento', 45);
            
            $table->unsignedBiginteger('festa_id')->unsigned();
            $table->unsignedBiginteger('user_id')->unsigned();

            $table->foreign('festa_id')->references('id')
                 ->on('festas')->onDelete('cascade');
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
        Schema::dropIfExists('table_senhas_festas');
    }
};
