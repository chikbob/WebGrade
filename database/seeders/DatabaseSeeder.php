<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Review;
use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Alex',
            'email' => 'ricarrdo1488@gmail.com',
            'password' => 'chikbob'
        ]);

        User::factory(119)->create();

        Site::factory(550)->create();

        Review::factory(250)->create();
    }
}
