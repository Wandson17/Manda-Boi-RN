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
        Schema::create('festas_cantores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('festa_id')->unsigned();
            $table->unsignedBigInteger('cantor_id')->unsigned();

            $table->foreign('festa_id')->references('id')
                ->on('festas')->onDelete('cascade');
            $table->foreign('cantor_id')->references('id')
                ->on('cantores')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('festas_cantores');
    }
};
