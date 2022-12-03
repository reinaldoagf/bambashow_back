<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderProduct;
use App\Models\OrderProductDetail;
use App\Models\OrderProductPayment;
use App\Models\User;
use App\Models\Product;
use Faker\Factory;
class OrderProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $status = ['pendiente','en revisión','aprobado, por enviar','recibido'];
        $sizes=['SS','S','M','L','XL'];
        $payments=[
            'https://cuentaindividual.info/wp-content/uploads/afiliacion-exitosa-bdv.jpg',
            'https://consultasvenezuela.com/wp-content/uploads/2020/07/comprobante.jpg',
            'https://i.ytimg.com/vi/_LH_rnq37Jo/mqdefault.jpg'
        ];
        for ($i=0; $i < rand(2,5); $i++) { 
            $user= User::inRandomOrder()->first();
            $order = new OrderProduct();
            $order->status=$status[rand(0,3)];
            $order->id_user=$user->id;
            $order->save();
            for ($j=0; $j < rand(1,3); $j++) { 
                $product= Product::inRandomOrder()->first();
                $detail = new OrderProductDetail();
                $detail->quantity=rand(1,4);
                $detail->size=$sizes[rand(0,4)];
                $detail->id_product=$product->id;
                $detail->id_order_product=$order->id;
                $detail->save();
            }
            for ($j=0; $j < rand(1,3); $j++) { 
                $payment = new OrderProductPayment();
                $payment->amount=$faker->randomFloat(2,1,100);
                $payment->code=$faker->postcode;
                $payment->description=$faker->text;
                $payment->image=$payments[rand(0,2)];
                $payment->id_order_product=$order->id;
                $payment->save();
            }
        }
    }
}
