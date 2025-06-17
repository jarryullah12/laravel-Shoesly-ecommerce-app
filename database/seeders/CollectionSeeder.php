<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear existing collections
        DB::table('collections')->truncate();
        
        // Insert shoe-focused collections
        DB::table('collections')->insert([
            [
                'name' => 'Summer Essentials',
                "price" => "0",
                "description" => "A collection of lightweight and breathable shoes perfect for summer wear",
                "category" => "seasonal",
                "gallery" => "summer-collection.jpg"
            ],
            [
                'name' => 'Sport Performance',
                "price" => "0",
                "description" => "High-performance athletic shoes designed for serious athletes",
                "category" => "sports",
                "gallery" => "sport-performance.jpg"
            ],
            [
                'name' => 'Classic Styles',
                "price" => "0",
                "description" => "Timeless shoe designs that never go out of style",
                "category" => "casual",
                "gallery" => "classic-styles.jpg"
            ],
            [
                'name' => 'Limited Edition',
                "price" => "0",
                "description" => "Exclusive and limited-run shoe releases for collectors",
                "category" => "premium",
                "gallery" => "limited-edition.jpg"
            ],
            [
                'name' => 'Sustainable Footwear',
                "price" => "0",
                "description" => "Eco-friendly shoes made with sustainable materials and processes",
                "category" => "eco",
                "gallery" => "sustainable-collection.jpg"
            ],
            [
                'name' => 'Urban Streetwear',
                "price" => "0",
                "description" => "Fashion-forward shoes for the style-conscious urban dweller",
                "category" => "fashion",
                "gallery" => "urban-streetwear.jpg"
            ],
            [
                'name' => 'Outdoor Adventure',
                "price" => "0",
                "description" => "Durable and functional shoes for hiking and outdoor activities",
                "category" => "outdoor",
                "gallery" => "outdoor-adventure.jpg"
            ],
            [
                'name' => 'Budget Friendly',
                "price" => "0",
                "description" => "Quality footwear at affordable prices",
                "category" => "value",
                "gallery" => "budget-friendly.jpg"
            ]
        ]);
    }
}