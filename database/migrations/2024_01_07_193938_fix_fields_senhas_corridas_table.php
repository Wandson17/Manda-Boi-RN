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
            $table->dropColumn('representacao');
            $table->unsignedBigInteger('representacao_id');
            $table->foreign('representacao_id')
                ->references('id')->on('cities')->onDelete('cascade');
            $table->dropColumn('cpf_esteira');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('senhas_corridas', function (Blueprint $table) {
            $table->dropColumn('representacao_id');
            $table->string('representacao');
            $table->string('cpf_esteira');
        });
    }
};
