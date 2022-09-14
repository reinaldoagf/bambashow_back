<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        $user=new User();
    	$user->name="admin";
    	$user->email="admin@test.com";
    	$user->password=Hash::make("12345678");
    	$user->id_rol=1;
        $user->save();
    }
}
