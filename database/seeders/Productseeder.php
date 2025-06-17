<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Productseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
                'name'=>'Oppo Mobile',
                "price"=>"20000",
                "description"=>"a smartphone with 8gb ram and much more feature",
                "short_description"=>"8GB RAM smartphone",
                "category"=>"mobile",
                "gallery"=>"https://assetscdn1.paytm.com/images/catalog/product/M/MO/MOBOPPO-A52-6-GFUTU6297453D3D253C/1592019058170_0..png",
                "gallery2"=>"https://assetscdn1.paytm.com/images/catalog/product/M/MO/MOBOPPO-A52-6-GFUTU6297453D3D253C/1592019058170_0..png",
                "gallery3"=>"https://assetscdn1.paytm.com/images/catalog/product/M/MO/MOBOPPO-A52-6-GFUTU6297453D3D253C/1592019058170_0..png"
            ],
            [
                'name'=>'Samsung TV',
                "price"=>"10000",
                "description"=>"a smart tv with much more feature",
                "short_description"=>"Smart TV with HD display",
                "category"=>"tv",
                "gallery"=>"https://i.gadgets360cdn.com/products/televisions/large/1548154685_832_panasonic_32-inch-lcd-full-hd-tv-th-l32u20.jpg",
                "gallery2"=>"https://i.gadgets360cdn.com/products/televisions/large/1548154685_832_panasonic_32-inch-lcd-full-hd-tv-th-l32u20.jpg",
                "gallery3"=>"https://i.gadgets360cdn.com/products/televisions/large/1548154685_832_panasonic_32-inch-lcd-full-hd-tv-th-l32u20.jpg"
            ],
            [
                'name'=>'LG TV',
                "price"=>"15000",
                "description"=>"a smart with much more feature",
                "short_description"=>"LG Smart TV",
                "category"=>"tv",
                "gallery"=>"https://4.imimg.com/data4/PM/KH/MY-34794816/lcd-500x500.png",
                "gallery2"=>"https://4.imimg.com/data4/PM/KH/MY-34794816/lcd-500x500.png",
                "gallery3"=>"https://4.imimg.com/data4/PM/KH/MY-34794816/lcd-500x500.png"
            ],
            [
                'name'=>'panasonic fridge',
                "price"=>"10000",
                "description"=>"a fridge with much more feature",
                "short_description"=>"Panasonic refrigerator",
                "category"=>"fridge",
                "gallery"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTFx-2-wTOcfr5at01ojZWduXEm5cZ-sRYPJA&usqp=CAU",
                "gallery2"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTFx-2-wTOcfr5at01ojZWduXEm5cZ-sRYPJA&usqp=CAU",
                "gallery3"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTFx-2-wTOcfr5at01ojZWduXEm5cZ-sRYPJA&usqp=CAU"
            ]
        ]);
    
    }
}
