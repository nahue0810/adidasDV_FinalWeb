<?php

namespace adidasDV\Http\Controllers;

use adidasDV\Modelos\TipoArticulo;
use adidasDV\Modelos\Articulo;
use adidasDV\Modelos\Sucursal;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
        return view("web.index");
    }


    public function contacto(){
        return view("web.contacto");

    }
    
    public function sucursales(Sucursal $sucursal){
        
     $sucursales = $sucursal->all();

     return view('web.sucursales',compact('sucursales'));
     //   return view('web.sucursales');
    }

    public function articulos(Articulo $articulo){
        
        $articulos = $articulo->with("TipoArticulo")->get();
        
        $articulos = $articulos->all();

        return view('web.articulos',compact('articulos'));
    }
}
