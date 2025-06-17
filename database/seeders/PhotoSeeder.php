<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Photo;
use Illuminate\Support\Facades\DB;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear existing photos
        DB::table('photos')->truncate();
        
        // Sample photo data
        $photos = [
            [
                'image' => 'product1.jpg',
                'size' => '1024x768'
            ],
            [
                'image' => 'product2.jpg',
                'size' => '800x600'
            ],
            [
                'image' => 'product3.jpg',
                'size' => '1280x720'
            ],
            [
                'image' => 'banner1.jpg',
                'size' => '1920x480'
            ],
            [
                'image' => 'profile1.jpg',
                'size' => '400x400'
            ],
        ];
        
        // Insert the photo data
        foreach ($photos as $photoData) {
            Photo::create($photoData);
        }
        
        // Also create some random photos using factory
        Photo::factory()->count(15)->create();
    }
}