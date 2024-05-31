<?php

namespace Database\Seeders;

use App\Models\Child;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChildTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Child::factory()->count(20)->create();

        Child::where('education_stage', 'kg1')->update(['age' => 3]);
        Child::where('education_stage', 'kg2')->update(['age' => 4]);
        Child::where('education_stage', 'kg3')->update(['age' => 5]);
    }
}
