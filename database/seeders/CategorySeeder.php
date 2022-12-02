<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\category::create([
            'name' => 'Ремонт дорог',
        ]);
        \App\Models\category::create([
            'name' => 'Уборка мусора',
        ]);
        \App\Models\category::create([
            'name' => 'Жалоба',
        ]);
    }
}
