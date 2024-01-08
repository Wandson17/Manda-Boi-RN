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
            $table->float('valor_total')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('senhas_corridas', function (Blueprint $table) {
            $table->dropColumn('valor_total');
        });
    }
};
