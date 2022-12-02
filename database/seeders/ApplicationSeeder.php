<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Application::create([
            'title' => 'Ремонт дорог',
            'description' => 'Ремонт дорог в районе улицы Ленина',
            'category_id' => 1,
            'status_id' => 1,
            'user_id' => 1,
            'image_before' => 'https://picsum.photos/1920/1080?grayscale',
            'image_after' => 'https://picsum.photos/1920/1080',
        ]);
        \App\Models\Application::create([
            'title' => 'Уборка мусора',
            'description' => 'Уборка мусора в районе улицы Ленина',
            'category_id' => 2,
            'status_id' => 1,
            'user_id' => 1,
            'image_before' => 'https://picsum.photos/1920/1080?grayscale',
                'image_after' => 'https://picsum.photos/1920/1080',
        ]);
        \App\Models\Application::create([
            'title' => 'Жалоба на соседа',
            'description' => 'Жалоба на соседа в районе улицы Ленина',
            'category_id' => 3,
            'status_id' => 1,
            'user_id' => 1,
            'image_before' => 'https://picsum.photos/1920/1080?grayscale',
                'image_after' => 'https://picsum.photos/1920/1080',
        ]);
        \App\Models\Application::create([
            'title' => 'Уборка мусора',
            'description' => 'Уборка мусора в районе улицы Советская',
            'category_id' => 2,
            'status_id' => 3,
            'user_id' => 1,
            'image_before' => 'https://picsum.photos/1920/1080?grayscale',
            'image_after' => 'https://picsum.photos/1920/1080',
        ]);
        \App\Models\Application::create([
            'title' => 'Уборка мусора',
            'description' => 'Уборка мусора в районе улицы Советская',
            'category_id' => 2,
            'status_id' => 4,
            'user_id' => 1,
            'image_before' => 'https://picsum.photos/1920/1080?grayscale',
            'image_after' => 'https://picsum.photos/1920/1080',
            'reason' => 'Уборка мусора уже проводилась',
        ]);
    }
}
