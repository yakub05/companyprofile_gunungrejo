<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Admin::create([
            'nama' => 'SLAMET MOCHAMAD YAKUB',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('123456'),
            'NoTelp' => '0896959860001',
            'AdminFoto' => 'test.jpg',
        ]);
    }
}
