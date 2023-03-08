<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $this->call(LocationsSeeder::class);

        // \App\Models\User::create([
        //     'name' => 'Muhammad Imam',
        //     'username' => 'udinzoldyck5',
        //     'email' => 'udin@example.com',
        //     'password' => bcrypt('ugans123'),
        //     'kelamin' => 'laki',
        //     'telp' => '087700935379',
        //     'alamat' => 'Wendit Timur',
        //     'role' => 'customer',
        // ]);

        // \App\Models\User::create([
        //     'name' => 'Admin',
        //     'username' => 'udinzoldyck5',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('ugans123'),
        //     'kelamin' => 'laki',
        //     'telp' => '087700935379',
        //     'alamat' => 'Bamban',
        //     'role' => 'admin',
        // ]);

        // Product::factory(12)->create();
    }
}
