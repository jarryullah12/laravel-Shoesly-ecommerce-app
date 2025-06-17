<?php

// Define the directory where images will be saved
$targetDir = __DIR__ . '/storage/app/public/images/1/';

// Make sure the directory exists
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}

// Array of shoe names for which we need to create placeholder images
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

// Background colors for different brands (to make them visually distinct)
$bgColors = [
    'nike-air-max' => '#f0f0f0',
    'adidas-ultraboost' => '#dcdcf0',
    'puma-rsx' => '#f0dcdc',
    'reebok-classic' => '#dcf0dc',
    'new-balance-574' => '#f0e6d2',
    'converse-chuck' => '#d2f0e6',
    'vans-oldskool' => '#e6d2f0',
    'brooks-ghost' => '#d2e6f0',
    'asics-gel' => '#f0d2e6',
    'timberland-boot' => '#e6f0d2'
];

echo "Creating SVG placeholder images for shoes...\n";

foreach ($shoeNames as $baseFileName => $shoeName) {
    for ($i = 1; $i <= 3; $i++) {
        $fileName = $baseFileName . "-{$i}.jpg";
        echo "Creating $fileName...\n";
        
        // Skip if file already exists and has content
        if (file_exists($targetDir . $fileName) && filesize($targetDir . $fileName) > 1000) {
            echo "File $fileName already exists with content, skipping...\n";
            continue;
        }
        
        // Create a simple SVG placeholder
        $bgColor = $bgColors[$baseFileName] ?? '#f0f0f0';
        
        $svg = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" width="800" height="600" viewBox="0 0 800 600">
  <rect width="800" height="600" fill="$bgColor"/>
  <text x="400" y="280" font-family="Arial" font-size="24" text-anchor="middle" fill="#333333">$shoeName</text>
  <text x="400" y="320" font-family="Arial" font-size="20" text-anchor="middle" fill="#333333">View $i</text>
  <path d="M300,400 C350,350 450,350 500,400 C550,450 600,450 650,400 L650,450 L300,450 Z" fill="#555555"/>
</svg>
SVG;
        
        // Save the SVG to a file
        file_put_contents($targetDir . $fileName, $svg);
        
        echo "Created $fileName\n";
    }
}

echo "\nAll placeholder images have been created in the target directory.\n";
echo "You can now run the database seeder to update the products table.\n";
