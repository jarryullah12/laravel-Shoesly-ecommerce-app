<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Main seeders for existing tables
        $this->call([
            // User seeders
            UserSeeder::class,
            
            // Product and collection seeders
            Productseeder::class,
            CollectionSeeder::class,
            
            // Photos
            PhotoSeeder::class
        ]);
        
        // Optional seeders that may fail gracefully
        if (Schema::hasTable('cart')) {
            $this->call(CartSeeder::class);
        }
        
        if (Schema::hasTable('orders')) {
            $this->call(OrderSeeder::class);
        }
        
        if (Schema::hasTable('comments')) {
            $this->call(CommentSeeder::class);
        }
        
        if (Schema::hasTable('members')) {
            $this->call(membersSeeder::class);
        }
    }
}