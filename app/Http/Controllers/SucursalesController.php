<?php

namespace adidasDV\Http\Controllers;

use adidasDV\Modelos\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SucursalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Sucursal $sucursal)
    {
        $sucursales = $sucursal->all();
        
        return view('panel.sucursales.index')->with('sucursales', $sucursales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Sucursal $sucursal)
    {
        $sucursales = $sucursal->all()->pluck('nombre','id_sucursal','descripcion');
        
        return view('panel.sucursales.form', compact('sucursales'));
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
            "descripcion" => "required|string",
        ];
        
        $validacion = Validator::make($request->all(),$validaciones);
        
        if($validacion->fails())
            return redirect()->back()->withErrors($validacion);
        
        // pasó la validación

        $request->imagen->storeAs("sucursales",$request->nombre.".".$request->imagen->extension());

        $data = $request->except("imagen");

        $data["imagen"] = "storage/sucursales/".$request->nombre.".".$request->imagen->extension();
        
        $sucursal = Sucursal::create($data);

        if($sucursal)
            return redirect()->route('sucursales.index');
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
    public function edit($id, Sucursal $sucursal)
    {
        $sucursal = $sucursal->find($id);
        
        if(!$sucursal)
            return redirect()->back()->withErrors("La sucursal que se quiere editar no existe");
        
        $sucursales = $sucursal->all()->pluck('nombre','id_sucursal','descripcion');
        
        return view('panel.sucursales.form', compact('sucursales', 'sucursal'));
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
        $sucursal = Sucursal::find($id);
        
        if(!$sucursal)
            return redirect()->back()->withErrors("La sucursal a editar no existe");
        
        $validaciones = [
            "nombre" => "required|string",
            "imagen" => "required",
            "descripcion" => "required|string",
        ];

        $validar = $request->validate($validaciones);

        $request->imagen->storeAs("sucursales",$request->nombre.".".$request->imagen->extension());

        $data = $request->except("imagen");

        $data["imagen"] = "storage/sucursales/".$request->nombre.".".$request->imagen->extension();


        if(!$sucursal->update($data)):
            return redirect()->back()->withErrors("No se pudo editar la sucursal");

        endif;

        return redirect()->route('sucursales.index')->with("ok","La sucursal se editó correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sucursal = Sucursal::find($id);
        
        if(!$sucursal)
            return redirect()->back()->withErrors("No se puede eliminar la sucursal");
        
        if($sucursal->delete())
            return redirect()->route('sucursales.index')->with("ok","Se borró la sucursal seleccionada");
    }
}
