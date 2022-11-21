<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;
use Faker\Factory;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach (["Alta definición", "Vinil textil", "Estampado"] as $key => $value) {
            $category=new ProductCategory();
            $category->name=$value;
            $category->description=$faker->text;            
            $category->save();
        }
    }
}
