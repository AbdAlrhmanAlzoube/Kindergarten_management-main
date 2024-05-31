<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Advertisement;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
        UsersTableSeeder::class,
        TeachersTableSeeder::class,
        ForebearsTableSeeder::class,
        ChildTableSeeder::class,
        CourseSeeder::class,
        ReviewSeeder::class,
        AdvertisementSeeder::class
    ]);
    }
}
