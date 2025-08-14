<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CameraSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cameras')->insert([
            [
                'marca' => 'Canon',
                'modelo' => 'EOS Rebel T7',
                'resolucao' => '24MP',
                'preco' => 2500.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Nikon',
                'modelo' => 'D3500',
                'resolucao' => '24MP',
                'preco' => 2800.00,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'marca' => 'Sony',
                'modelo' => 'Alpha a6000',
                'resolucao' => '24.3MP',
                'preco' => 3200.00,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
