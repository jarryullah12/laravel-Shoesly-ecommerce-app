<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Product;

class Productseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // First clear the existing products table
        DB::table('products')->truncate();
        
        // Insert predefined shoe products with multiple gallery images
        DB::table('products')->insert([
            [
                'name'=>'Nike Air Max',
                "price"=>"12000",
                "description"=>"Comfortable running shoes with air cushioning technology.",
                "category"=>"shoes",
                "gallery"=>"nike-air-max-1.jpg",
                "gallery2"=>"nike-air-max-2.jpg",
                "gallery3"=>"nike-air-max-3.jpg"
            ],
            [
                'name'=>'Adidas Ultraboost',
                "price"=>"15000",
                "description"=>"Premium running shoes with responsive boost cushioning.",
                "category"=>"shoes",
                "gallery"=>"adidas-ultraboost-1.jpg",
                "gallery2"=>"adidas-ultraboost-2.jpg",
                "gallery3"=>"adidas-ultraboost-3.jpg"
            ],
            [
                'name'=>'Puma RS-X',
                "price"=>"8000",
                "description"=>"Stylish casual sneakers with chunky design.",
                "category"=>"shoes",
                "gallery"=>"puma-rsx-1.jpg",
                "gallery2"=>"puma-rsx-2.jpg",
                "gallery3"=>"puma-rsx-3.jpg"
            ],
            [
                'name'=>'Reebok Classic Leather',
                "price"=>"6000",
                "description"=>"Iconic casual shoes with timeless design.",
                "category"=>"shoes",
                "gallery"=>"reebok-classic-1.jpg",
                "gallery2"=>"reebok-classic-2.jpg",
                "gallery3"=>"reebok-classic-3.jpg"
            ],
            [
                'name'=>'New Balance 574',
                "price"=>"9000",
                "description"=>"Comfortable lifestyle shoes with classic design.",
                "category"=>"shoes",
                "gallery"=>"new-balance-574-1.jpg",
                "gallery2"=>"new-balance-574-2.jpg",
                "gallery3"=>"new-balance-574-3.jpg"
            ],
            [
                'name'=>'Asics Gel-Lyte III',
                "price"=>"11000",
                "description"=>"Premium lifestyle shoes with gel cushioning.",
                "category"=>"shoes",
                "gallery"=>"asics-gel-lyte-1.jpg",
                "gallery2"=>"asics-gel-lyte-2.jpg",
                "gallery3"=>"asics-gel-lyte-3.jpg"
            ]
        ]);
        
        // Create additional random shoe products using the factory with shorter descriptions
        Product::factory()->count(14)->create();
    }
}