<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Rol;
class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role=new Rol();
    	$role->name="admin";
    	$role->descriptions="admin rol";
        $role->save();
        $role=new Rol();
    	$role->name="client";
    	$role->descriptions="client rol";
        $role->save();
    }
}
