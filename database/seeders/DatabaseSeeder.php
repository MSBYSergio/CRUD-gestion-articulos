<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create(); // Creo los usuarios
        $this->call(TagSeeder::class); // Después los tags usando un seeder
        Article::factory(40) -> create(); // Por último los artículos
    }
}
