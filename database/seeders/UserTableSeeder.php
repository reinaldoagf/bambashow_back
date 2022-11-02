<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Faker\Factory;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private function generateStaticElements($faker)
    {
        $user = new User();
        $user->name = "admin";
        $user->email = "admin@test.com";
        $user->password = Hash::make("12345678");
        $user->id_rol = 1;
        $user->photo = 'https://cdn-icons-png.flaticon.com/512/1801/1801901.png';
        $user->address = $faker->address;
        $user->root = 1;
        $user->save();
        
        $photos = [
            'https://www.jc-mouse.net/wp-content/uploads/2019/09/rostro-generado-por-ia-inteligencia-artificial.jpg',
            'https://www.lavanguardia.com/files/content_image_mobile_filter/uploads/2019/09/24/5fa53ad436161.jpeg',
            'https://quinpu.com/uploads/default/original/1X/1fdefe68f250939e1fc9e558b31dc3e6646d8958.jpeg'
        ];

        foreach ($photos as $key => $value) {
            # code...
            $user = new User();
            $user->name = $faker->name;
            $user->email = $faker->email;
            $user->password = Hash::make("12345678");
            $user->id_rol = 1;
            $user->photo = $value;
            $user->address = $faker->address;
            $user->save();
        }
    }
    private function generateDinamicElements($faker)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/users');
        $elements = $response->json();
        foreach ($elements as $key => $value) {
            $user = new User();
            $user->name = $value["name"];
            $user->email = "client" . $key . "@test.com";
            $user->password = Hash::make("12345678");
            $user->id_rol = 2;
            $user->photo = 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($user->email))) . 's=80&d=mp&r=g';
            $user->address = $value["address"]["street"] ? $value["address"]["street"] : null;
            $user->save();
        }
    }
    public function run()
    {
        $faker = Factory::create();


        $this->generateStaticElements($faker);
        $this->generateDinamicElements($faker);
    }
}
