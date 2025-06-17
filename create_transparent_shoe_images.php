<?php

// Define the directory where images will be saved
$targetDir = __DIR__ . '/storage/app/public/images/1/';

// Make sure the directory exists
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}

// Array of shoe names for which we need to create transparent images
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

echo "Creating transparent PNG images for shoes...\n";

foreach ($shoeNames as $baseFileName => $shoeName) {
    for ($i = 1; $i <= 3; $i++) {
        $fileName = $baseFileName . "-{$i}.png";
        echo "Creating $fileName...\n";
        
        // Get brand color
        $brandColor = $brandColors[$baseFileName] ?? '#333333';
        
        // Create a transparent PNG with shoe silhouette
        $width = 800;
        $height = 600;
        
        // Create PNG content with transparent background
        $png = <<<PNG
<svg xmlns="http://www.w3.org/2000/svg" width="$width" height="$height" viewBox="0 0 $width $height">
  <style>
    .shoe-name { font-family: Arial; font-size: 24px; text-anchor: middle; fill: $brandColor; font-weight: bold; }
    .view-num { font-family: Arial; font-size: 18px; text-anchor: middle; fill: $brandColor; }
    .shoe { fill: $brandColor; }
  </style>
  <g>
    <!-- Shoe silhouette - different for each view -->
PNG;

        // Different silhouette based on view number
        switch ($i) {
            case 1: // Side view
                $png .= <<<SVG
    <path class="shoe" d="M200,400 C250,350 400,350 450,380 C500,410 550,420 600,400 L600,450 L200,450 Z" />
    <path class="shoe" d="M450,380 C460,370 470,350 480,330 C490,310 500,300 520,300 L540,320 L530,350 L510,380 Z" fill-opacity="0.7" />
SVG;
                break;
            case 2: // Top view
                $png .= <<<SVG
    <ellipse class="shoe" cx="400" cy="400" rx="200" ry="80" />
    <path class="shoe" d="M300,380 C350,360 450,360 500,380 C450,420 350,420 300,380 Z" fill-opacity="0.8" />
SVG;
                break;
            case 3: // Back view
                $png .= <<<SVG
    <path class="shoe" d="M300,450 L500,450 L500,350 C450,330 350,330 300,350 Z" />
    <path class="shoe" d="M350,350 C370,330 430,330 450,350 C430,370 370,370 350,350 Z" fill-opacity="0.7" />
SVG;
                break;
        }

        // Complete the SVG
        $png .= <<<SVG
  </g>
  <text x="400" y="280" class="shoe-name">$shoeName</text>
  <text x="400" y="320" class="view-num">View $i</text>
</svg>
SVG;
        
        // Save the SVG to a PNG file
        file_put_contents($targetDir . $fileName, $png);
        
        echo "Created $fileName\n";
    }
}

echo "\nAll transparent PNG images have been created in the target directory.\n";
echo "Now updating the database to use PNG files instead of JPG...\n";

// Connect to the database to update image extensions
try {
    $db = new PDO('mysql:host=localhost;dbname=shoesly', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Update all products to use PNG instead of JPG
    $stmt = $db->prepare("UPDATE products SET 
                          gallery = REPLACE(gallery, '.jpg', '.png'),
                          gallery2 = REPLACE(gallery2, '.jpg', '.png'),
                          gallery3 = REPLACE(gallery3, '.jpg', '.png')");
    $stmt->execute();
    
    echo "Database updated successfully to use PNG files.\n";
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage() . "\n";
}

echo "Process completed. Please refresh your browser to see the transparent images.\n";
