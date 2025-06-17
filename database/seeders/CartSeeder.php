<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear existing cart items
        DB::table('cart')->truncate();
        
        // Get existing user IDs
        $userIds = DB::table('users')->pluck('id')->toArray();
        
        // Get existing product IDs
        $productIds = DB::table('products')->pluck('id')->toArray();
        
        $cartItems = [];
        
        // Create 10 random cart items
        for ($i = 0; $i < 10; $i++) {
            $userId = $userIds[array_rand($userIds)];
            $productId = $productIds[array_rand($productIds)];
            $product = DB::table('products')->where('id', $productId)->first();
            
            $cartItems[] = [
                'user_id' => $userId,
                'product_id' => $productId,
                'product_price' => $product->price
            ];
        }
        
        DB::table('cart')->insert($cartItems);
    }
}