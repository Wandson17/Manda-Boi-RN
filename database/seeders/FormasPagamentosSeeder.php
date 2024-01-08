<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormasPagamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $formasPagamentos = [
            'Cartão',
            'Boleto',
            'Pix',
        ];

        foreach ($formasPagamentos as $formaPagamento) {
            DB::table('formas_pagamentos')->insert(['forma_pagamento' => $formaPagamento]);
        }

    }
}
