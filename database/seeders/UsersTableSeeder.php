<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(20)->create();

        // Specific users
        User::create([
            'first_name' => 'Teacher',
            'last_name' => 'User',
            'address' => '123 Teacher St',
            'phone' => '123-456-7890',
            'email' => 'teacher@teacher.com',
            'password' => Hash::make('password'), // Use appropriate hashing
            'type' => 'teacher',
            'gender' => 'male',
        ]);

        User::create([
            'first_name' => 'forebear',
            'last_name' => 'User',
            'address' => '123 Student St',
            'phone' => '123-456-7890',
            'email' => 'forebear@forebear.com',
            'password' => Hash::make('password'), 
            'type' => 'student',
            'gender' => 'female',
        ]);

        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'address' => '123 Admin St',
            'phone' => '123-456-7890',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'), // Use appropriate hashing
            'type' => 'admin',
            'gender' => 'male',
        ]);
    }
}
