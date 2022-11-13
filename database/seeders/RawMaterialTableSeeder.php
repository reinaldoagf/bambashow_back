<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RawMaterial;

class RawMaterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ([
                "Tipo de tela",
                "Tazas","Llaveros",
                "Material de vinil textil",
                "Material de sublimación"
            ] as $key => $value) {
            $rawMaterial=new RawMaterial();
            $rawMaterial->name=$value;
            $rawMaterial->save();
        }
    }
}
