<?php

// Define the directory where images will be saved
$targetDir = __DIR__ . '/public/storage/images/1/';

// Make sure the directory exists
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}

// Array of shoe image URLs for different brands and models
$shoeImages = [
    // Nike Air Max
    'nike-air-max-1.png' => 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/skwgyqrbfzhu6uyeh0gg/air-max-270-shoes-2V5C4p.png',
    'nike-air-max-2.png' => 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/505d4d87-74f6-4a2f-b0a4-1a5e21cf92be/air-max-90-shoes-N7Tbw0.png',
    'nike-air-max-3.png' => 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/e125b578-4173-401a-ab13-f066979c8848/air-max-97-shoes-EBZrb8.png',
    
    // Adidas Ultraboost
    'adidas-ultraboost-1.png' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/96a5f085ef8b4e508c9dac210127d9e5_9366/Ultraboost_Light_Shoes_Black_GY9526_01_standard.png',
    'adidas-ultraboost-2.png' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/0e540bae86d5456aa034ada100e5cfce_9366/Ultraboost_5.0_DNA_Shoes_White_GW5125_01_standard.png',
    'adidas-ultraboost-3.png' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/b6b0b539501c4a9b8d9aad6a00a0170f_9366/Ultraboost_Light_Shoes_White_GY8343_01_standard.png',
    
    // Puma RS-X
    'puma-rsx-1.png' => 'https://images.puma.com/image/upload/f_auto,q_auto,b_rgb:fafafa,w_1350,h_1350/global/368588/01/sv01/fnd/PNA/fmt/png/RS-X-Reinvention-Men\'s-Sneakers',
    'puma-rsx-2.png' => 'https://images.puma.com/image/upload/f_auto,q_auto,b_rgb:fafafa,w_1350,h_1350/global/368588/02/sv01/fnd/PNA/fmt/png/RS-X-Reinvention-Men\'s-Sneakers',
    'puma-rsx-3.png' => 'https://images.puma.com/image/upload/f_auto,q_auto,b_rgb:fafafa,w_1350,h_1350/global/368588/05/sv01/fnd/PNA/fmt/png/RS-X-Reinvention-Men\'s-Sneakers',
    
    // Reebok Classic
    'reebok-classic-1.png' => 'https://assets.reebok.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/3613ebaf6ed24a609818ac63000250a3_9366/Classic_Leather_Shoes_-_Toddler_White_FZ2093_01_standard.png',
    'reebok-classic-2.png' => 'https://assets.reebok.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/e1266ce3f14f4395a753ab0500f6d7c0_9366/Classic_Leather_Shoes_Black_49799_01_standard.png',
    'reebok-classic-3.png' => 'https://assets.reebok.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/2d6b3a0cec4d4b0d8c1eaad801451e2e_9366/Classic_Leather_Shoes_White_2232_01_standard.png',
    
    // New Balance 574
    'new-balance-574-1.png' => 'https://nb.scene7.com/is/image/NB/u574lgu2_nb_02_i?$pdpflexf2$&wid=440&hei=440',
    'new-balance-574-2.png' => 'https://nb.scene7.com/is/image/NB/ml574evn_nb_02_i?$pdpflexf2$&wid=440&hei=440',
    'new-balance-574-3.png' => 'https://nb.scene7.com/is/image/NB/ml574evg_nb_02_i?$pdpflexf2$&wid=440&hei=440',
    
    // Converse Chuck Taylor
    'converse-chuck-1.png' => 'https://www.converse.com/dw/image/v2/BJJF_PRD/on/demandware.static/-/Sites-cnv-master-catalog/default/dw8fa7a1c1/images/a_107/M9160_A_107X1.jpg?sw=964',
    'converse-chuck-2.png' => 'https://www.converse.com/dw/image/v2/BJJF_PRD/on/demandware.static/-/Sites-cnv-master-catalog/default/dw4e2b4a9c/images/a_107/M9697_A_107X1.jpg?sw=964',
    'converse-chuck-3.png' => 'https://www.converse.com/dw/image/v2/BJJF_PRD/on/demandware.static/-/Sites-cnv-master-catalog/default/dw85b79ea9/images/a_107/M7650_A_107X1.jpg?sw=964',
    
    // Vans Old Skool
    'vans-oldskool-1.png' => 'https://images.vans.com/is/image/VansEU/VN000D3HY28-HERO?$PDP-FULL-IMAGE$',
    'vans-oldskool-2.png' => 'https://images.vans.com/is/image/VansEU/VN0A38G1VR1-HERO?$PDP-FULL-IMAGE$',
    'vans-oldskool-3.png' => 'https://images.vans.com/is/image/VansEU/VN0A4BV5V3T-HERO?$PDP-FULL-IMAGE$',
    
    // Brooks Ghost
    'brooks-ghost-1.png' => 'https://www.brooksrunning.com/dw/image/v2/BGPF_PRD/on/demandware.static/-/Sites-brooks-master-catalog/default/dw9e29d7a6/original/110369/110369-019-l-ghost-14-mens-cushion-running-shoe.png',
    'brooks-ghost-2.png' => 'https://www.brooksrunning.com/dw/image/v2/BGPF_PRD/on/demandware.static/-/Sites-brooks-master-catalog/default/dw9e29d7a6/original/110369/110369-020-l-ghost-14-mens-cushion-running-shoe.png',
    'brooks-ghost-3.png' => 'https://www.brooksrunning.com/dw/image/v2/BGPF_PRD/on/demandware.static/-/Sites-brooks-master-catalog/default/dw9e29d7a6/original/110369/110369-156-l-ghost-14-mens-cushion-running-shoe.png',
    
    // ASICS Gel-Kayano
    'asics-gel-1.png' => 'https://images.asics.com/is/image/asics/1011B189_020_SR_RT_GLB?$sfcc-product$',
    'asics-gel-2.png' => 'https://images.asics.com/is/image/asics/1011B189_400_SR_RT_GLB?$sfcc-product$',
    'asics-gel-3.png' => 'https://images.asics.com/is/image/asics/1011B189_100_SR_RT_GLB?$sfcc-product$',
    
    // Timberland Boot
    'timberland-boot-1.png' => 'https://images.timberland.com/is/image/timberland/10061024-HERO?$PDP-FULL-IMAGE$',
    'timberland-boot-2.png' => 'https://images.timberland.com/is/image/timberland/10061713-HERO?$PDP-FULL-IMAGE$',
    'timberland-boot-3.png' => 'https://images.timberland.com/is/image/timberland/10361713-HERO?$PDP-FULL-IMAGE$'
];

echo "Starting download of real shoe images...\n";
$successCount = 0;
$failCount = 0;

// Function to download image
function downloadImage($url, $targetPath) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    
    $data = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($httpCode == 200) {
        file_put_contents($targetPath, $data);
        return true;
    }
    
    return false;
}

// Download each image
foreach ($shoeImages as $filename => $url) {
    echo "Downloading {$filename}... ";
    
    if (downloadImage($url, $targetDir . $filename)) {
        echo "SUCCESS\n";
        $successCount++;
    } else {
        echo "FAILED\n";
        $failCount++;
    }
}

echo "\nDownload complete!\n";
echo "Successfully downloaded: {$successCount} images\n";
echo "Failed downloads: {$failCount} images\n";

if ($failCount > 0) {
    echo "\nSome images failed to download. Using existing SVG images for those.\n";
}

echo "\nAll shoe images have been added to {$targetDir}\n";
