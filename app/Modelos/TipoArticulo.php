<?php

namespace adidasDV\Modelos;

use Illuminate\Database\Eloquent\Model;

class TipoArticulo extends Model
{
    protected $table = "tipo_articulo";
    
    protected $primaryKey = 'id_tipo_articulo';

    public $timestamps = true;

    protected $fillable = ["nombre"];
    
    
        public function Articulo(){
        return $this->hasMany(Articulo::class,'id_tipo_articulo');
    }
}
