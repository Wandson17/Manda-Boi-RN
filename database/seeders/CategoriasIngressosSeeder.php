<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasIngressosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            'VIP',
            'Estudante',
            'Pista',
            'Meia'
        ];

        
        foreach ($categorias as $categoria) {
            DB::table('categorias_ingressos')->upsert(['categoria' => $categoria], 'id');
        }
    }
}
