<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Check for products with SVG images
$products = DB::table('products')
    ->whereRaw('gallery LIKE "%.svg" OR gallery2 LIKE "%.svg" OR gallery3 LIKE "%.svg"')
    ->get();

echo "Products with SVG images:\n";

if ($products->isEmpty()) {
    echo "No products found with SVG images.\n";
} else {
    foreach ($products as $product) {
        echo "ID: {$product->id}, Name: {$product->name}\n";
        echo "  Gallery: {$product->gallery}\n";
        echo "  Gallery2: {$product->gallery2}\n";
        echo "  Gallery3: {$product->gallery3}\n\n";
    }
}

// Check if any products have PNG images already
echo "\nProducts with PNG images:\n";

$pngProducts = DB::table('products')
    ->whereRaw('gallery LIKE "%.png" OR gallery2 LIKE "%.png" OR gallery3 LIKE "%.png"')
    ->get();

if ($pngProducts->isEmpty()) {
    echo "No products found with PNG images.\n";
} else {
    foreach ($pngProducts as $product) {
        echo "ID: {$product->id}, Name: {$product->name}\n";
        echo "  Gallery: {$product->gallery}\n";
        echo "  Gallery2: {$product->gallery2}\n";
        echo "  Gallery3: {$product->gallery3}\n\n";
    }
}