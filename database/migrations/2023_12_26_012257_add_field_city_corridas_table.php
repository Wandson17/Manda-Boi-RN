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
        Schema::table('corridas', function (Blueprint $table) {
            $table->unsignedBigInteger('city')->nullable(false);
            $table->foreign('city')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('corridas', function (Blueprint $table) {
            $table->dropForeign(['city']);
            $table->dropColumn('city');
        });
    }
};
