<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SettingsContentSocialNetworks;
use App\Models\SettingsContentAccountBank;
use Faker\Factory;

class SettingsContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach ([[
            "name"=>"twitter",
            "icon"=>"twitter",
            "url"=>"https://twitter.com/bambashow",
            "tooltip"=>"Follow us",
        ], [
            "name"=>"facebook",
            "icon"=>"facebook-square",
            "url"=>"https://www.facebook.com/bambashow",
            "tooltip"=>"Like us",
        ], [
            "name"=>"instagram",
            "icon"=>"instagram",
            "url"=>"https://www.instagram.com/bambashow",
            "tooltip"=>"Follow us",
        ]] as $key => $value1) {
            SettingsContentSocialNetworks::create($value1);
        }
        foreach ([
            [
                'bank'=>'mercantil',
                'account_number'=>$faker->numerify('###################'),
                'email'=>$faker->email,
                'identity_card'=>$faker->numerify('V-#########'),
                'phone'=>$faker->phoneNumber
            ], 
            [
                'bank'=>'provincial',
                'account_number'=>$faker->numerify('###################'),
                'email'=>$faker->email,
                'identity_card'=>$faker->numerify('V-#########'),
                'phone'=>$faker->phoneNumber
            ], 
            [
                'bank'=>'banco de venezuela',
                'account_number'=>$faker->numerify('###################'),
                'email'=>$faker->email,
                'identity_card'=>$faker->numerify('V-#########'),
                'phone'=>$faker->phoneNumber
            ], 
            [
                'bank'=>'banco bicentenario',
                'account_number'=>$faker->numerify('###################'),
                'email'=>$faker->email,
                'identity_card'=>$faker->numerify('V-#########'),
                'phone'=>$faker->phoneNumber
            ],
            [
                'bank'=>'banesco',
                'account_number'=>$faker->numerify('###################'),
                'email'=>$faker->email,
                'identity_card'=>$faker->numerify('V-#########'),
                'phone'=>$faker->phoneNumber
            ],
            [
                'bank'=>'banco exterior',
                'account_number'=>$faker->numerify('###################'),
                'email'=>$faker->email,
                'identity_card'=>$faker->numerify('V-#########'),
                'phone'=>$faker->phoneNumber
            ],
            [
                'bank'=>'banco nacional de crédito',
                'account_number'=>$faker->numerify('###################'),
                'email'=>$faker->email,
                'identity_card'=>$faker->numerify('V-#########'),
                'phone'=>$faker->phoneNumber
            ],
            [
                'bank'=>'bod',
                'account_number'=>$faker->numerify('###################'),
                'email'=>$faker->email,
                'identity_card'=>$faker->numerify('V-#########'),
                'phone'=>$faker->phoneNumber
            ],
        ] as $key => $value) {
            SettingsContentAccountBank::create($value);
        }
    }
}
