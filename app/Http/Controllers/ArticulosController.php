<?php

namespace adidasDV\Http\Controllers;

use adidasDV\Modelos\Articulo;
use adidasDV\Modelos\TipoArticulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticulosController extends Controller
{

    public function index(Articulo $articulo)
    {
        $articulos = $articulo->all();
        
        return view('panel.articulos.index')->with('articulos', $articulos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TipoArticulo $tipoarticulo)
    {
        $tipos = $tipoarticulo->all()->pluck('nombre','id_tipo_articulo');
        
        return view('panel.articulos.form',compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validaciones = [
            "nombre" => "required|string",
            "imagen" => "required",
            "id_tipo_articulo" => "required|exists:tipo_articulo,id_tipo_articulo"
        ];
        
        $mensajes = [
            "id_tipo_articulo.required" => "El campo tipo de articulo es requerido",
            "id_tipo_articulo.exists" => "El tipo de articulo seleccionado no existe"
        ];
        
        $validacion = Validator::make($request->all(),$validaciones,$mensajes);
        
        if($validacion->fails())
            return redirect()->back()->withErrors($validacion);
        
        // pasó la validación

        $request->imagen->storeAs("articulos",$request->nombre.".".$request->imagen->extension());

        $data = $request->except("imagen");

        $data["imagen"] = "storage/articulos/".$request->nombre.".".$request->imagen->extension();
        
        $articulo = Articulo::create($data);

        if($articulo)
            return redirect()->route('articulos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, TipoArticulo $tipoArticulo, Articulo $articulo)
    {
        $articulo = $articulo->find($id);
        
        if(!$articulo)
            return redirect()->back()->withErrors("El articulo que se quiere editar no existe");
        
        $tipos = $tipoArticulo->all()->pluck('nombre','id_tipo_articulo');
        
        return view('panel.articulos.form', compact('tipos', 'articulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $articulo = Articulo::find($id);
        
        if(!$articulo)
            return redirect()->back()->withErrors("El articulo a editar no existe");
        
        $validaciones = [
            "nombre" => "required|string",
            "imagen" => "required",
            "id_tipo_articulo" => "required|exists:tipo_articulo,id_tipo_articulo"
        ];

        $validar = $request->validate($validaciones);

        $request->imagen->storeAs("articulos",$request->nombre.".".$request->imagen->extension());

        $data = $request->except("imagen");

        $data["imagen"] = "storage/articulos/".$request->nombre.".".$request->imagen->extension();


        if(!$articulo->update($data)):
            return redirect()->back()->withErrors("No se pudo editar el articulo");

        endif;

        return redirect()->route('articulos.index')->with("ok","El articulo se editó correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = Articulo::find($id);
        
        if(!$articulo)
            return redirect()->back()->withErrors("No se puede eliminar el articulo");
        
        if($articulo->delete())
            return redirect()->route('articulos.index')->with("ok","Se borró el articulo seleccionado");
    }
}
