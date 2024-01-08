<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSenhasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            'Amador',
            'Profissional',
            'Feminino',
            'Master',
            'Jovem',
            'Aspirante',
            'Aberto'
        ];

        foreach ($categorias as $categoria) {
            DB::table('categoria_senhas')->insert(['categoria' => $categoria]);
        }

    }
}
