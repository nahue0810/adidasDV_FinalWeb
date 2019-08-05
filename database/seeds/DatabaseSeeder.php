<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SucursalSeeder::class);
        $this->call(TipoArticuloSeeder::class);
        $this->call(ArticuloSeeder::class);
    }
}
