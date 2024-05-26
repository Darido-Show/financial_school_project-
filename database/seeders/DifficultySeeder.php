<?php

namespace Database\Seeders;

use App\Models\Difficulty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DifficultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Difficulty::factory()->create([
            'level' => 'beginner'
        ]);

        Difficulty::factory()->create([
            'level' => 'intermediate'
        ]);

        Difficulty::factory()->create([
            'level' => 'advanced'
        ]);
        
    }
}
