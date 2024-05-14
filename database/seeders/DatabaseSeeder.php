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
            'email' => 'test@text.com',
            'password' => '1234567890'
        ]);

        User::factory(9)->create();

        Site::factory(10)->create();

        Review::factory(10)->create();
    }
}
