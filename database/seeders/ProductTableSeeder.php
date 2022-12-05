<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\ProductImage;
use Faker\Factory;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $sizes=['SS','S','M','L','XL'];
        foreach ([[
            "name"=>"Franela",
            "images"=>[
                "https://http2.mlstatic.com/D_NQ_NP_607214-MLV44537802567_012021-O.jpg",
                "https://http2.mlstatic.com/D_NQ_NP_795974-MLV31250828413_062019-O.jpg",
                "https://http2.mlstatic.com/D_NQ_NP_986083-MLV45398493563_032021-O.jpg"
            ],
        ], [
            "name"=>"Sweater",
            "images"=>[
                "https://http2.mlstatic.com/D_NQ_NP_750934-MLV50167128418_062022-O.jpg",
                "https://http2.mlstatic.com/D_NQ_NP_851023-MLV50324002319_062022-W.jpg",
                "https://m.media-amazon.com/images/I/81webbh+pRL._AC_SY550_.jpg"
            ],
        ], [
            "name"=>"Taza",
            "images"=>[
                "https://comunicacioneslatamjli.com/wp-content/uploads/2021/04/tazas-navidenas.jpg",
                "https://http2.mlstatic.com/D_NQ_NP_897227-MLV49718695105_042022-O.jpg",
                "https://www.amiregalo.es/photo/mug-messsage-ensoleille1.jpg"
            ],
        ], [
            "name"=>"Franela",
            "images"=>[
                "https://static.wixstatic.com/media/0f9c41_964ec98e575d424581f3616c7bb7220c~mv2.jpg/v1/fit/w_500,h_500,q_90/file.jpg",
            ],
        ], [
            "name"=>"Llaveros",
            "images"=>[
                "https://i.pinimg.com/736x/82/69/1b/82691b6501e4937b39242b67dd8714b0.jpg",
                "https://www.puntoservicios.cl/wp-content/uploads/2021/06/0456-3-llavero-redondo-sublimable-plata-estampados-grabados-impresion-fotografia-ceramicas-trofeos-galvanos-copia-de-llaves.jpg",
            ],
        ], [
            "name"=>"Sweater",
            "images"=>[
                "https://http2.mlstatic.com/D_NQ_NP_926588-MLV47791914309_102021-O.jpg"
            ],
        ]] as $key => $value1) {
            $category= ProductCategory::inRandomOrder()->first();
            $product=new Product();
            $product->name=$value1["name"];
            $product->price=$faker->randomFloat(2,1,100);
            $product->id_product_category=$category->id;
            $product->save();

            foreach ( array_fill(0, rand(1,6), null) as $key => $value2) {
                $stock=new ProductStock();
                $stock->quantity=rand(2,6);
                $stock->size=$sizes[rand(0,4)];
                $stock->id_product=$product->id;
                $stock->save();
            }
            foreach ( $value1["images"] as $key => $value2) {
                $image=new ProductImage();
                $image->url=$value2;
                $image->id_product=$product->id;
                $image->save();
            }
        }
    }
}
