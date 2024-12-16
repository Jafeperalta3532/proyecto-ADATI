<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\marcas;
use App\Models\piezas;
use Illuminate\Support\Facades\Validator;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands  = marcas::all();
        return view('catalogo.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
            'descripcion' => 'required|regex:/^[\pL\s\-]+$/u',
            

        ]);


        $brand = new marcas;
        $brand -> nombre = $request -> nombre;
        $brand -> descripcion = $request -> descripcion;
        $brand-> save();

        return redirect()->back() ->with('Se ha creado una nueva categoria');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request -> validate([
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
            'descripcion' => 'required|regex:/^[\pL\s\-]+$/u',
            

        ]);
        
        $brand =  marcas::findOrFail($id);
        $brand -> nombre = $request -> nombre;
        $brand -> descripcion = $request -> descripcion;
        $brand-> save();

        return redirect() -> back()-> with('Se ha actualizado una categoría');
    } 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, marcas $brands)
    {
        $brands = marcas::findOrFail($id);
        $brands -> piezas() -> delete();
        $brands -> delete();

        return redirect()-> back()-> with('Se ha eliminado una categoría');
    }
}
