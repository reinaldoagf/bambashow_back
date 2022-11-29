<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\ProductStock;
// use Faker\Factory;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes=['SS','S','M','L','XL'];
        foreach ([[
            "name"=>"Franela"
        ], [
            "name"=>"Soeter"
        ], [
            "name"=>"Taza"
        ]] as $key => $value1) {
            $category= ProductCategory::inRandomOrder()->first();
            $product=new Product();
            $product->name=$value1["name"];
            $product->id_product_category=$category->id;
            $product->save();

            foreach ( array_fill(0, rand(1,6), null) as $key => $value2) {
                $stock=new ProductStock();
                $stock->quantity=rand(2,6);
                $stock->size=$sizes[rand(0,4)];
                $stock->id_product=$product->id;
                $stock->save();                
            }
        }
    }
}
