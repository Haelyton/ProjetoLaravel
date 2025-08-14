<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemoryCardSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('memory_cards')->insert([
            [
                'marca' => 'SanDisk',
                'tipo' => 'SD',
                'capacidade' => 64,
                'preco' => 150.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Kingston',
                'tipo' => 'MicroSD',
                'capacidade' => 128,
                'preco' => 200.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Lexar',
                'tipo' => 'SD',
                'capacidade' => 256,
                'preco' => 400.00,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
