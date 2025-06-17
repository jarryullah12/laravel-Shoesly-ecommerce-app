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
    'nike-air-max' => [240, 240, 240],
    'adidas-ultraboost' => [220, 220, 240],
    'puma-rsx' => [240, 220, 220],
    'reebok-classic' => [220, 240, 220],
    'new-balance-574' => [240, 230, 210],
    'converse-chuck' => [210, 240, 230],
    'vans-oldskool' => [230, 210, 240],
    'brooks-ghost' => [210, 230, 240],
    'asics-gel' => [240, 210, 230],
    'timberland-boot' => [230, 240, 210]
];

echo "Creating placeholder images for shoes...\n";

foreach ($shoeNames as $baseFileName => $shoeName) {
    for ($i = 1; $i <= 3; $i++) {
        $fileName = $baseFileName . "-{$i}.jpg";
        echo "Creating $fileName...\n";
        
        // Create a simple placeholder image (800x600)
        $image = imagecreatetruecolor(800, 600);
        
        // Set background color
        $bgColor = $bgColors[$baseFileName] ?? [240, 240, 240];
        $bg = imagecolorallocate($image, $bgColor[0], $bgColor[1], $bgColor[2]);
        $textColor = imagecolorallocate($image, 50, 50, 50);
        
        // Fill the background
        imagefilledrectangle($image, 0, 0, 800, 600, $bg);
        
        // Add shoe name
        $text1 = $shoeName;
        imagestring($image, 5, 320, 260, $text1, $textColor);
        
        // Add view number
        $text2 = "View {$i}";
        imagestring($image, 5, 350, 290, $text2, $textColor);
        
        // Draw a simple shoe outline
        $lineColor = imagecolorallocate($image, 100, 100, 100);
        // Shoe sole
        imagefilledarc($image, 400, 400, 500, 100, 0, 180, $lineColor, IMG_ARC_PIE);
        // Shoe top
        imagefilledarc($image, 400, 350, 300, 150, 180, 360, $lineColor, IMG_ARC_PIE);
        
        // Save the image
        imagejpeg($image, $targetDir . $fileName, 90);
        imagedestroy($image);
        
        echo "Created $fileName\n";
    }
}

echo "\nAll placeholder images have been created in the target directory.\n";
echo "You can now run the database seeder to update the products table.\n";
