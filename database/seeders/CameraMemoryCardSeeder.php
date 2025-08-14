<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CameraMemoryCardSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('camera_memory_card')->insert([
            ['camera_id' => 1, 'memory_card_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['camera_id' => 1, 'memory_card_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['camera_id' => 2, 'memory_card_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['camera_id' => 3, 'memory_card_id' => 3, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
