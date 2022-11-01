<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Models\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $user=new User();
    	$user->name="admin";
    	$user->email="admin@test.com";
    	$user->password=Hash::make("12345678");
    	$user->id_rol=1;
    	$user->root=1;
        $user->save();
        $response = Http::get('https://jsonplaceholder.typicode.com/users');
        $elements = $response->json();
        foreach ($elements as $key => $value) {
            $user = new User();
            $user->name = $value["name"];
            $user->email = "client".$key."@test.com";
            $user->password = Hash::make("12345678");
            $user->id_rol = 2;
            $user->photo = $faker->imageUrl($width = 640, $height = 480);
            $user->address = $value["address"]["street"] ? $value["address"]["street"] : null;
            $user->save(); 
        }
    }
}
