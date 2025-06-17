<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateProductImagesFromSvgToPng extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Get all products with SVG images
        $products = DB::table('products')->get();
        
        foreach ($products as $product) {
            $updates = [];
            
            // Check and update gallery field
            if (!empty($product->gallery) && $this->endsWith(strtolower($product->gallery), '.svg')) {
                $updates['gallery'] = str_replace('.svg', '.png', $product->gallery);
            }
            
            // Check and update gallery2 field
            if (!empty($product->gallery2) && $this->endsWith(strtolower($product->gallery2), '.svg')) {
                $updates['gallery2'] = str_replace('.svg', '.png', $product->gallery2);
            }
            
            // Check and update gallery3 field
            if (!empty($product->gallery3) && $this->endsWith(strtolower($product->gallery3), '.svg')) {
                $updates['gallery3'] = str_replace('.svg', '.png', $product->gallery3);
            }
            
            // Update the product if any changes were made
            if (!empty($updates)) {
                DB::table('products')->where('id', $product->id)->update($updates);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Get all products with PNG images
        $products = DB::table('products')->get();
        
        foreach ($products as $product) {
            $updates = [];
            
            // Check and update gallery field
            if (!empty($product->gallery) && $this->endsWith(strtolower($product->gallery), '.png')) {
                $updates['gallery'] = str_replace('.png', '.svg', $product->gallery);
            }
            
            // Check and update gallery2 field
            if (!empty($product->gallery2) && $this->endsWith(strtolower($product->gallery2), '.png')) {
                $updates['gallery2'] = str_replace('.png', '.svg', $product->gallery2);
            }
            
            // Check and update gallery3 field
            if (!empty($product->gallery3) && $this->endsWith(strtolower($product->gallery3), '.png')) {
                $updates['gallery3'] = str_replace('.png', '.svg', $product->gallery3);
            }
            
            // Update the product if any changes were made
            if (!empty($updates)) {
                DB::table('products')->where('id', $product->id)->update($updates);
            }
        }
    }
    
    /**
     * Helper function to check if a string ends with a specific substring
     * Compatible with PHP 7.x
     */
    private function endsWith($haystack, $needle) {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }
        return (substr($haystack, -$length) === $needle);
    }
}
