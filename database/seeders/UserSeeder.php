<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear existing users
        // Use DB facade instead of model to avoid issues with truncate
        DB::table('users')->truncate();
        
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'gender' => 'Male',
            'password' => Hash::make('password123'),
        ]);
        
        // Create regular users
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'gender' => 'Male',
            'password' => Hash::make('password123'),
        ]);
        
        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'gender' => 'Female',
            'password' => Hash::make('password123'),
        ]);
        
        // Create 10 random users using factory
        User::factory()->count(10)->create();
    }
}