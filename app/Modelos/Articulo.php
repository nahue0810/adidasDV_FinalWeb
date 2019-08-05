<?php

namespace adidasDV\Modelos;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = "articulo";

    protected $primaryKey = "id_articulo";

    
    public $timestamps = true;

   
    protected $fillable = ["nombre","imagen",'id_tipo_articulo'];
    
    public function TipoArticulo(){
            return $this->belongsTo(TipoArticulo::class,'id_tipo_articulo');
        }

}
