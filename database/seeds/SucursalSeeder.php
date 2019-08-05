<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 1; $i < 100; $i++):
        
            DB::table('sucursal')->insert([
                "id_sucursal" => $i,
                "nombre"   => $faker->safeColorName,
                "imagen" => 'img/sucursalfaker.jpg',
                "descripcion" =>'img/descripcionfaker.txt'
            ]);
        endfor;   
    }
}
