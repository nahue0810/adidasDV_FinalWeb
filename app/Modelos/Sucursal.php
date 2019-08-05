<?php

namespace adidasDV\Modelos;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = "sucursal";

    protected $primaryKey = "id_sucursal";

    
    public $timestamps = true;

    
    protected $fillable =   ["nombre","imagen","descripcion"];
}
