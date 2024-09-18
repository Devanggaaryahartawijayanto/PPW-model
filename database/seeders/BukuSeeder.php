<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 10; $i++) {
            Buku::create([
                'title' => fake()->sentence(3),
                'author' => fake()->name(),
                'price' => fake()->numberBetween(1000, 10000),
                'published_date' => fake()->date(),
            ]);
        }
    }

}
