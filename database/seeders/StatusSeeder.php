<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Status::create([
            'name' => 'Новая',
        ]);
        \App\Models\Status::create([
            'name' => 'В работе',
        ]);
        \App\Models\Status::create([
            'name' => 'Решена',
        ]);
        \App\Models\Status::create([
            'name' => 'Отклонена',
        ]);
    }
}
