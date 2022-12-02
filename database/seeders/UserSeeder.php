<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'firstName' => 'Admin',
            'lastName' => 'Admin',
            'patronymic' => 'Admin',
            'email' => 'admin',
            'password' => 'adminWSR',
            'login' => 'admin',
            'admin' => 1,
        ]);
        \App\Models\User::factory()->count(9)->create();
    }
}
