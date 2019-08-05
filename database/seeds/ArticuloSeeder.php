<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create("es_AR");

        for($i = 1; $i < 61; $i++):

            DB::table("articulo")->insert([
               "id_articulo" => $i,
               "nombre" => $faker->safeColorName,
               "imagen" => "img/" . $faker->randomElement(["calzado","remera","pantalon"]) . ".jpg",
               "id_tipo_articulo" => $faker->numberBetween(1,3),
                "created_at" => date("Y-m-d H:i:s")
            ]);

        endfor;
    }
}
