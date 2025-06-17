<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear existing comments
        DB::table('comments')->truncate();
        
        // Array of realistic shoe product review comments
        $shoeComments = [
            "These shoes are incredibly comfortable, I can wear them all day without any discomfort.",
            "Perfect fit and great quality! I'm really happy with this purchase.",
            "The design is stylish and goes well with most of my outfits.",
            "I've been wearing these for a month and they're holding up well.",
            "Good shoes for the price, but the sizing runs a bit small.",
            "Very comfortable for running and everyday wear.",
            "The cushioning is excellent, great for long walks.",
            "These shoes exceeded my expectations. Highly recommend!",
            "The color looks even better in person than in the pictures.",
            "Great grip on different surfaces, perfect for my daily activities.",
            "Nice shoes, but they took some time to break in.",
            "I love the support these provide for my high arches.",
            "Quality seems good, but I wish they had more color options.",
            "Very lightweight and breathable, perfect for summer.",
            "These have become my go-to shoes for casual wear.",
            "The materials feel premium and durable.",
            "Excellent arch support and heel cushioning.",
            "I bought these for my job where I stand all day, and they're perfect.",
            "Good value for money, comparable to more expensive brands.",
            "I've received many compliments on these shoes!"
        ];
        
        $comments = [];
        
        // Create 20 random comments
        for ($i = 0; $i < 20; $i++) {
            // Random date within the last 60 days
            $date = Carbon::now()->subDays(rand(1, 60))->format('Y-m-d H:i:s');
            
            $comments[] = [
                'comment' => $shoeComments[array_rand($shoeComments)],
                'approve' => rand(0, 1), // randomly approve or not
                'created_at' => $date,
                'updated_at' => $date
            ];
        }
        
        DB::table('comments')->insert($comments);
    }
}