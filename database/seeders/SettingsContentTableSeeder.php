<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SettingsContentSocialNetworks;
class SettingsContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
