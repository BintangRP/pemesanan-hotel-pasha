<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kamar;
use Illuminate\Database\Seeder;

class KamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kamar::factory()->create([
            'nama' => 'Standar',
            'harga' => 100000,
        ]);
        Kamar::factory()->create([
            'nama' => 'Deluxe',
            'harga' => 500000,
        ]);
        Kamar::factory()->create([
            'nama' => 'Family',
            'harga' => 1000000,
        ]);
    }
}
