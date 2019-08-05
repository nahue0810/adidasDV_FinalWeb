<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo', function (Blueprint $table) {
            $table->increments('id_articulo');
            $table->string('nombre',50);
            $table->string('imagen',255)->nullable();
            $table->unsignedInteger('id_tipo_articulo');
            $table->foreign('id_tipo_articulo')->references('id_tipo_articulo')->on('tipo_articulo')->onUpdate("cascade")->onDelete("no action");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulo');
    }
}
