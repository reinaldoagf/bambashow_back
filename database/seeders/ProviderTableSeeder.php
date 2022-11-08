<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Provider;
use Faker\Factory;
class ProviderTableSeeder extends Seeder
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
            $provider=new Provider();
            $provider->name=$faker->name;
            $provider->email=$faker->email;
            $provider->phone_number=$faker->phoneNumber;
            $provider->save();
        }

    }
}
