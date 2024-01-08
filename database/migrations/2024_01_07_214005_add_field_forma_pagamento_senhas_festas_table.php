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
        Schema::table('senhas_festas', function (Blueprint $table) {
            $table->unsignedBigInteger('forma_pagamento_id')->nullable();
            $table->foreign('forma_pagamento_id')->references('id')->on('formas_pagamentos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('senhas_festas', function (Blueprint $table) {
            $table->dropForeign('senhas_festas_forma_pagamento_id_foreign');
            $table->dropColumn('forma_pagamento_id');
        });
    }
};
