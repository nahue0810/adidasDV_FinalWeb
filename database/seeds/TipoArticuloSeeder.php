<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_articulo')->insert([
           [
               "id_tipo_articulo" => 1,
                "nombre" => "Calzado",
                "created_at" => date("Y-m-d h:i:s",time()),
           ],
            [
               "id_tipo_articulo" => 2,
                "nombre" => "Pantalon",
                "created_at" => date("Y-m-d h:i:s",time()),
           ],
            [
               "id_tipo_articulo" => 3,
                "nombre" => "Remera",
                "created_at" => date("Y-m-d h:i:s",time()),
           ],

        ]);
    }
}
