<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Get all products
$products = DB::table('products')->get();

$updatedCount = 0;

foreach ($products as $product) {
    $updates = [];
    
    // Check and update gallery field
    if (!empty($product->gallery) && str_ends_with($product->gallery, '.svg')) {
        $updates['gallery'] = str_replace('.svg', '.png', $product->gallery);
    }
    
    // Check and update gallery2 field
    if (!empty($product->gallery2) && str_ends_with($product->gallery2, '.svg')) {
        $updates['gallery2'] = str_replace('.svg', '.png', $product->gallery2);
    }
    
    // Check and update gallery3 field
    if (!empty($product->gallery3) && str_ends_with($product->gallery3, '.svg')) {
        $updates['gallery3'] = str_replace('.svg', '.png', $product->gallery3);
    }
    
    // If we have updates, apply them
    if (!empty($updates)) {
        DB::table('products')->where('id', $product->id)->update($updates);
        $updatedCount++;
        
        echo "Updated product ID: {$product->id}, Name: {$product->name}\n";
        if (isset($updates['gallery'])) echo "  Gallery: {$product->gallery} -> {$updates['gallery']}\n";
        if (isset($updates['gallery2'])) echo "  Gallery2: {$product->gallery2} -> {$updates['gallery2']}\n";
        if (isset($updates['gallery3'])) echo "  Gallery3: {$product->gallery3} -> {$updates['gallery3']}\n";
        echo "\n";
    }
}

echo "Total products updated: {$updatedCount}\n";