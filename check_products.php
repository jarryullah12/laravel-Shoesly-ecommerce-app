<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$products = DB::table('products')->select('id', 'name', 'gallery', 'gallery2', 'gallery3')->get();

foreach ($products as $product) {
    echo "ID: {$product->id}, Name: {$product->name}\n";
    echo "Gallery: {$product->gallery}\n";
    echo "Gallery2: {$product->gallery2}\n";
    echo "Gallery3: {$product->gallery3}\n\n";
}