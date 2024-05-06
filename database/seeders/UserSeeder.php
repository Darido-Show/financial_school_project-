<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Lovas',
            'email' => 'lovas@example.com'
        ]);

        User::create([
            'name' => 'Rafi',
            'email' => 'rafi@example.com'
        ]);
        
        User::factory(10)->create();
    }
}