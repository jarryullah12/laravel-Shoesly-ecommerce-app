<?php

// Define the directory where images will be saved
$targetDir = __DIR__ . '/public/storage/images/1/';

// Make sure the directory exists
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}

// Array of shoe names for which we need to create silhouette images
$shoeNames = [
    'nike-air-max' => 'Nike Air Max',
    'adidas-ultraboost' => 'Adidas Ultraboost',
    'puma-rsx' => 'Puma RS-X',
    'reebok-classic' => 'Reebok Classic Leather',
    'new-balance-574' => 'New Balance 574',
    'converse-chuck' => 'Converse Chuck Taylor',
    'vans-oldskool' => 'Vans Old Skool',
    'brooks-ghost' => 'Brooks Ghost 14',
    'asics-gel' => 'ASICS Gel-Kayano',
    'timberland-boot' => 'Timberland 6-Inch Boot'
];

// Brand colors for different shoes
$brandColors = [
    'nike-air-max' => '#FF0000',        // Red
    'adidas-ultraboost' => '#0000FF',   // Blue
    'puma-rsx' => '#FF6600',            // Orange
    'reebok-classic' => '#00CC00',      // Green
    'new-balance-574' => '#990099',     // Purple
    'converse-chuck' => '#000000',      // Black
    'vans-oldskool' => '#CC0000',       // Dark Red
    'brooks-ghost' => '#0099CC',        // Light Blue
    'asics-gel' => '#FF3399',           // Pink
    'timberland-boot' => '#996633'      // Brown
];

// Shoe silhouette SVG paths for different types
$shoeSilhouettes = [
    // Running shoe (Nike, Adidas, New Balance, Brooks, ASICS)
    'running' => [
        // Side view
        '<path d="M200,380 C250,350 400,350 500,380 C550,400 600,390 650,370 L650,450 L200,450 Z" />
         <path d="M500,380 C510,360 520,340 540,320 C560,300 580,290 600,290 L620,310 L610,340 L590,370 Z" fill-opacity="0.7" />',
        // Top view
        '<ellipse cx="400" cy="400" rx="220" ry="70" />
         <path d="M280,400 C350,370 450,370 520,400 C450,430 350,430 280,400 Z" fill-opacity="0.8" />',
        // Back view
        '<path d="M300,450 L500,450 L500,350 C450,330 350,330 300,350 Z" />
         <path d="M350,350 C370,330 430,330 450,350 C430,370 370,370 350,350 Z" fill-opacity="0.7" />'
    ],
    
    // Casual sneaker (Puma, Reebok, Vans)
    'casual' => [
        // Side view
        '<path d="M250,400 C300,380 400,380 500,390 C550,400 580,390 620,380 L620,450 L250,450 Z" />
         <path d="M500,390 C520,380 540,370 560,365 L580,380 L570,400 L550,410 Z" fill-opacity="0.7" />',
        // Top view
        '<path d="M300,400 Q400,350 500,400 Q400,450 300,400 Z" />
         <path d="M320,400 Q400,370 480,400 Q400,430 320,400 Z" fill-opacity="0.8" />',
        // Back view
        '<path d="M320,450 L480,450 L480,370 C420,350 380,350 320,370 Z" />
         <path d="M350,370 C380,350 420,350 450,370 C420,390 380,390 350,370 Z" fill-opacity="0.7" />'
    ],
    
    // High-top (Converse)
    'hightop' => [
        // Side view
        '<path d="M250,400 C300,380 400,380 500,390 C550,400 580,390 620,380 L620,450 L250,450 Z" />
         <path d="M500,390 C520,380 540,370 560,365 L580,380 L570,400 L550,410 Z" fill-opacity="0.7" />
         <path d="M400,380 C410,350 420,320 430,290 C440,260 450,240 460,230 L480,250 L470,300 L450,380 Z" fill-opacity="0.6" />',
        // Top view
        '<path d="M300,400 Q400,350 500,400 Q400,450 300,400 Z" />
         <path d="M320,400 Q400,370 480,400 Q400,430 320,400 Z" fill-opacity="0.8" />',
        // Back view
        '<path d="M320,450 L480,450 L480,300 C420,280 380,280 320,300 Z" />
         <path d="M350,300 C380,280 420,280 450,300 C420,320 380,320 350,300 Z" fill-opacity="0.7" />'
    ],
    
    // Boot (Timberland)
    'boot' => [
        // Side view
        '<path d="M250,400 C300,380 400,380 500,390 C550,400 580,390 620,380 L620,450 L250,450 Z" />
         <path d="M400,380 C410,350 420,320 430,290 C440,260 450,240 460,230 L480,250 L470,300 L450,380 Z" fill-opacity="0.8" />
         <path d="M400,380 L450,380 L450,290 L400,290 Z" fill-opacity="0.6" />',
        // Top view
        '<path d="M300,400 Q400,350 500,400 Q400,450 300,400 Z" />
         <path d="M320,400 Q400,370 480,400 Q400,430 320,400 Z" fill-opacity="0.8" />',
        // Back view
        '<path d="M320,450 L480,450 L480,300 C420,280 380,280 320,300 Z" />
         <path d="M350,300 C380,280 420,280 450,300 C420,320 380,320 350,300 Z" fill-opacity="0.7" />'
    ]
];

// Map shoe names to silhouette types
$shoeTypes = [
    'nike-air-max' => 'running',
    'adidas-ultraboost' => 'running',
    'puma-rsx' => 'casual',
    'reebok-classic' => 'casual',
    'new-balance-574' => 'running',
    'converse-chuck' => 'hightop',
    'vans-oldskool' => 'casual',
    'brooks-ghost' => 'running',
    'asics-gel' => 'running',
    'timberland-boot' => 'boot'
];

echo "Creating JPG shoe images with white backgrounds...\n";

// Update the database to use JPG files
try {
    // First, update the product seeder to use JPG files
    $seederPath = __DIR__ . '/database/seeders/Productseeder.php';
    if (file_exists($seederPath)) {
        $seederContent = file_get_contents($seederPath);
        $seederContent = str_replace('.png', '.jpg', $seederContent);
        file_put_contents($seederPath, $seederContent);
        echo "Updated product seeder to use JPG files.\n";
    }
} catch (Exception $e) {
    echo "Error updating seeder: " . $e->getMessage() . "\n";
}

foreach ($shoeNames as $baseFileName => $shoeName) {
    for ($i = 1; $i <= 3; $i++) {
        $fileName = $baseFileName . "-{$i}.jpg";
        echo "Creating $fileName...\n";
        
        // Get brand color and shoe type
        $brandColor = $brandColors[$baseFileName] ?? '#333333';
        $shoeType = $shoeTypes[$baseFileName] ?? 'running';
        
        // Get the appropriate silhouette for this view
        $silhouette = $shoeSilhouettes[$shoeType][$i-1];
        
        // Create a SVG with shoe silhouette on white background
        $width = 800;
        $height = 600;
        
        // Create SVG content with white background
        $svg = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" width="$width" height="$height" viewBox="0 0 $width $height">
  <rect width="100%" height="100%" fill="white"/>
  <style>
    .shoe-name { font-family: Arial; font-size: 24px; text-anchor: middle; fill: $brandColor; font-weight: bold; }
    .view-num { font-family: Arial; font-size: 18px; text-anchor: middle; fill: $brandColor; }
    .shoe { fill: $brandColor; }
  </style>
  <defs>
    <linearGradient id="shoeGradient" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" style="stop-color:$brandColor;stop-opacity:1" />
      <stop offset="100%" style="stop-color:$brandColor;stop-opacity:0.7" />
    </linearGradient>
    <filter id="shadow" x="-20%" y="-20%" width="140%" height="140%">
      <feDropShadow dx="3" dy="3" stdDeviation="5" flood-opacity="0.3"/>
    </filter>
  </defs>
  <g filter="url(#shadow)">
    <!-- Shoe silhouette -->
    <g fill="url(#shoeGradient)">
      $silhouette
    </g>
  </g>
  <text x="400" y="150" class="shoe-name">$shoeName</text>
  <text x="400" y="180" class="view-num">View $i</text>
</svg>
SVG;
        
        // Save the SVG to a JPG file
        file_put_contents($targetDir . $fileName, $svg);
        
        echo "Created $fileName\n";
    }
}

echo "\nAll JPG shoe images have been created in the target directory.\n";
echo "Now running the product seeder to update the database...\n";

// Run the product seeder to update the database
$command = 'php artisan db:seed --class=Productseeder';
$output = [];
$returnVar = 0;
exec($command, $output, $returnVar);

if ($returnVar === 0) {
    echo "Database updated successfully.\n";
} else {
    echo "Error updating database: " . implode("\n", $output) . "\n";
}

echo "\nProcess completed. Please refresh your browser to see the updated images.\n";
