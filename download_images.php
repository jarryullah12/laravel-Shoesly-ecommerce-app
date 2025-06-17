<?php

// Define the directory where images will be saved
$targetDir = __DIR__ . '/storage/app/public/images/1/';

// Make sure the directory exists
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}

// Array of shoe image URLs for different brands
$shoeImages = [
    // Nike Air Max
    'nike-air-max-1.jpg' => 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/7fbc5e94-8d49-4730-a280-f19d3cfad0b0/air-max-90-mens-shoes-6n3vKB.png',
    'nike-air-max-2.jpg' => 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/3cc96f43-47b6-43cb-951d-d8f73bb2f912/air-max-90-mens-shoes-6n3vKB.png',
    'nike-air-max-3.jpg' => 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/33533fe2-1157-4001-896e-1803b30659c8/air-max-90-mens-shoes-6n3vKB.png',
    
    // Adidas Ultraboost
    'adidas-ultraboost-1.jpg' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/96a5f085ef594e1a8020abad01056711_9366/Ultraboost_22_Shoes_Black_GZ0127_01_standard.jpg',
    'adidas-ultraboost-2.jpg' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/ce8a6d27e9d443629cbcadfd00e3b2c4_9366/Ultraboost_22_Shoes_Black_GZ0127_02_standard_hover.jpg',
    'adidas-ultraboost-3.jpg' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/b8c705eb54834287a6d0adfd00e3c046_9366/Ultraboost_22_Shoes_Black_GZ0127_03_standard.jpg',
    
    // Puma RS-X
    'puma-rsx-1.jpg' => 'https://images.puma.com/image/upload/f_auto,q_auto,b_rgb:fafafa,w_2000,h_2000/global/369579/01/sv01/fnd/PNA/fmt/png/RS-X-Reinvention-Mens-Sneakers',
    'puma-rsx-2.jpg' => 'https://images.puma.com/image/upload/f_auto,q_auto,b_rgb:fafafa,w_2000,h_2000/global/369579/01/mod02/fnd/PNA/fmt/png/RS-X-Reinvention-Mens-Sneakers',
    'puma-rsx-3.jpg' => 'https://images.puma.com/image/upload/f_auto,q_auto,b_rgb:fafafa,w_2000,h_2000/global/369579/01/bv/fnd/PNA/fmt/png/RS-X-Reinvention-Mens-Sneakers',
    
    // Reebok Classic Leather
    'reebok-classic-1.jpg' => 'https://www.reebok.com/dw/image/v2/BCZC_PRD/on/demandware.static/-/Sites-reebok-products/default/dw8b1c4865/zoom/BS9004_01.jpg',
    'reebok-classic-2.jpg' => 'https://www.reebok.com/dw/image/v2/BCZC_PRD/on/demandware.static/-/Sites-reebok-products/default/dw8b1c4865/zoom/BS9004_02.jpg',
    'reebok-classic-3.jpg' => 'https://www.reebok.com/dw/image/v2/BCZC_PRD/on/demandware.static/-/Sites-reebok-products/default/dw8b1c4865/zoom/BS9004_03.jpg',
    
    // New Balance 574
    'new-balance-574-1.jpg' => 'https://nb.scene7.com/is/image/NB/ml574evg_nb_02_i?$pdpflexf2$&wid=440&hei=440',
    'new-balance-574-2.jpg' => 'https://nb.scene7.com/is/image/NB/ml574evg_nb_05_i?$pdpflexf2$&wid=440&hei=440',
    'new-balance-574-3.jpg' => 'https://nb.scene7.com/is/image/NB/ml574evg_nb_03_i?$pdpflexf2$&wid=440&hei=440',
    
    // Converse Chuck Taylor
    'converse-chuck-1.jpg' => 'https://www.converse.com/dw/image/v2/BCZC_PRD/on/demandware.static/-/Sites-cnv-master-catalog/default/dw8fa7a1a4/images/a_107/M9160_A_107X1.jpg',
    'converse-chuck-2.jpg' => 'https://www.converse.com/dw/image/v2/BCZC_PRD/on/demandware.static/-/Sites-cnv-master-catalog/default/dw52d1c2c4/images/d_08/M9160_D_08X1.jpg',
    'converse-chuck-3.jpg' => 'https://www.converse.com/dw/image/v2/BCZC_PRD/on/demandware.static/-/Sites-cnv-master-catalog/default/dwcb3d6a7c/images/e_08/M9160_E_08X1.jpg',
    
    // Vans Old Skool
    'vans-oldskool-1.jpg' => 'https://images.vans.com/is/image/VansEU/VD3HY28-HERO?$583x583$',
    'vans-oldskool-2.jpg' => 'https://images.vans.com/is/image/VansEU/VD3HY28-ALT1?$583x583$',
    'vans-oldskool-3.jpg' => 'https://images.vans.com/is/image/VansEU/VD3HY28-ALT2?$583x583$',
    
    // Brooks Ghost 14
    'brooks-ghost-1.jpg' => 'https://www.brooksrunning.com/dw/image/v2/BGPF_PRD/on/demandware.static/-/Sites-brooks-master-catalog/default/dw9d487c7a/original/110369/110369-063-l-ghost-14-mens-cushion-running-shoe.jpg',
    'brooks-ghost-2.jpg' => 'https://www.brooksrunning.com/dw/image/v2/BGPF_PRD/on/demandware.static/-/Sites-brooks-master-catalog/default/dw2e0f4b4b/original/110369/110369-063-d-ghost-14-mens-cushion-running-shoe.jpg',
    'brooks-ghost-3.jpg' => 'https://www.brooksrunning.com/dw/image/v2/BGPF_PRD/on/demandware.static/-/Sites-brooks-master-catalog/default/dw5b1e1c9e/original/110369/110369-063-m-ghost-14-mens-cushion-running-shoe.jpg',
    
    // ASICS Gel-Kayano
    'asics-gel-1.jpg' => 'https://images.asics.com/is/image/asics/1011B189_020_SR_RT_GLB',
    'asics-gel-2.jpg' => 'https://images.asics.com/is/image/asics/1011B189_020_SR_LT_GLB',
    'asics-gel-3.jpg' => 'https://images.asics.com/is/image/asics/1011B189_020_SR_BT_GLB',
    
    // Timberland 6-Inch Boot
    'timberland-boot-1.jpg' => 'https://images.timberland.com/is/image/timberland/10061024-HERO',
    'timberland-boot-2.jpg' => 'https://images.timberland.com/is/image/timberland/10061024-ALT1',
    'timberland-boot-3.jpg' => 'https://images.timberland.com/is/image/timberland/10061024-ALT2'
];

// Function to download image using cURL
function downloadImage($url, $savePath) {
    $ch = curl_init($url);
    
    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36');
    
    // Execute cURL session and get the content
    $imageData = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    // Close cURL session
    curl_close($ch);
    
    // Check if the request was successful
    if ($httpCode == 200 && !empty($imageData)) {
        // Save the image to the specified path
        file_put_contents($savePath, $imageData);
        return true;
    }
    
    return false;
}

// Create a simple text-based image as a fallback
function createTextImage($text, $savePath) {
    $content = "<!-- Placeholder for $text -->\n";
    $content .= "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"800\" height=\"600\">\n";
    $content .= "  <rect width=\"100%\" height=\"100%\" fill=\"#f0f0f0\"/>\n";
    $content .= "  <text x=\"50%\" y=\"50%\" font-family=\"Arial\" font-size=\"24\" text-anchor=\"middle\" fill=\"#333333\">$text</text>\n";
    $content .= "</svg>";
    
    file_put_contents($savePath, $content);
}

// Download each image and save it to the target directory
$successCount = 0;
$failCount = 0;

echo "Starting to download shoe images...\n";

foreach ($shoeImages as $fileName => $url) {
    echo "Downloading $fileName from $url...\n";
    
    $filePath = $targetDir . $fileName;
    
    // Try to download the image
    if (downloadImage($url, $filePath)) {
        echo "Successfully saved $fileName\n";
        $successCount++;
    } else {
        echo "Failed to download $fileName, creating placeholder...\n";
        createTextImage("Shoe Image: $fileName", $filePath);
        $failCount++;
    }
}

echo "\nDownload complete!\n";
echo "Successfully downloaded: $successCount images\n";
echo "Created placeholders for: $failCount images\n";
echo "All images are now available in the target directory.\n";
echo "You can now run the database seeder to update the products table.\n";
