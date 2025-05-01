<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'title' => 'Registro de Ponto',
                'description' => 'Registro de ponto',
                'status' => 1
            ],
            [
                'id' => 2,
                'title' => 'Financeiro',
                'description' => 'Registro Financeiro',
                'status' => 1
            ]
        ];
         \App\Models\Category::create($data);
    }
}
