<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderSupplier;
use App\Models\OrderSupplierItem;
use App\Models\RawMaterial;
use App\Models\Provider;
use Faker\Factory;
class OrderSupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach ([0,1,2,3,4,5] as $key => $value) {
            $provider= Provider::inRandomOrder()->first();
            $order = new OrderSupplier();
            $order->message=$faker->text;
            $order->id_provider=$provider->id;
            $order->save();
            foreach ([0,1,2] as $key => $value) {
                $rawMaterial= RawMaterial::inRandomOrder()->first();
                $item = new OrderSupplierItem();
                $item->quantity=rand(2,4);
                $item->square_meter=rand(2,4);
                $item->id_order_supplier=$order->id;
                $item->id_raw_material=$rawMaterial->id;
                $item->save();
            }
        }
    }
}
