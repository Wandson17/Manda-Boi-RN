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
        Schema::table('senhas_corridas', function (Blueprint $table) {
            $table->unsignedBigInteger('categoria_senhas_id')->nullable();
            $table->foreign('categoria_senhas_id')->references('id')->on('categoria_senhas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('senhas_corridas', function (Blueprint $table) {
            $table->dropForeign('senhas_corridas_categoria_senhas_id_foreign');
            $table->dropColumn('categoria_senhas_id');
        });
    }
};
