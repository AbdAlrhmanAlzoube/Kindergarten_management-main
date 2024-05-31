<?php

namespace Database\Seeders;

use App\Models\Forebear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForebearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Forebear::factory()->count(20)->create();
    }
}
