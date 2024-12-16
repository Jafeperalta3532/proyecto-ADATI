<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\marcas;
use App\Models\piezas;
use Illuminate\Support\Facades\Validator;

class PiezasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($marca_id)
    {
        $brands = marcas::findOrFail($marca_id);
        $pieza = piezas::where('marca_id', $marca_id)->get();
        return view('refacciones.index', compact('pieza', 'brands', 'marca_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($marca_id)
    {
        $brands= marcas::findOrFail($marca_id);
        return view ('refacciones.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $marca_id)
    {
        $request -> validate([
            'tipo' => 'required|regex:/^[\pL\s\-]+$/u',
            'stock' => 'required|numeric',
            'descripcion' => 'required|regex:/^[\pL\s\-]+$/u',

        ],
        [
            'stock.numeric' => 'Para el campo stock, solo se admiten numeros',
            'descripcion.required' => 'Es obligatorio este campo',
            'descripcion.regex' => 'Parae el campo descripcion, solo se admiten letras',
            'tipo.regex' => 'para el campo tipo, solo se admiten letras',
            'tipo.required' => 'Es obligatorio este campo',
            'tipo' => 'required|numeric',
        ]);


        $marca = marcas::findOrFail($marca_id); // encuentra la marca por su ID

        $pieza = new piezas;
        $pieza -> tipo = $request -> tipo;
        $pieza -> stock = $request -> stock;
        $pieza -> descripcion = $request -> descripcion;
        $pieza -> marca_id = $marca_id; // asigna el ID de la marca al pieza
        $pieza -> save();// guarda la pieza en la base de datos
        
        return redirect()->route('refacciones.index', ['marca_id' => $marca_id])
        ->with('Exito', 'Se ha agregado una nueva pieza.');

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
    public function update(Request $request, string $id, $marca_id)
    {
        $request->validate([
            'tipo' => 'required|string|regex:/^[\pL\s\-]+$/u',
            'stock' => 'required|numeric',
            'descripcion' => 'required|string|regex:/^[\pL\s\-]+$/u',
        ]);

        $pieza = piezas::findOrFail($id);
        $pieza->tipo = $request->tipo; // Correctly assign tipo
        $pieza->stock = $request->stock;
        $pieza->descripcion = $request->descripcion;
        $pieza->save();

        return redirect()->route('refacciones.index', ['marca_id' => $marca_id])
            ->with('Exito', 'La pieza ha sido actualizada exitosamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, $marca_id)
    {
        $piezas = piezas::findOrFail($id);
        $piezas -> delete();

           // Redirige a la ruta 'refacciones.index' pasando el parámetro 'marca_id'
    return redirect()->route('refacciones.index', ['marca_id' => $marca_id])
    ->with('Exito', 'La pieza ha sido borrada exitosamente');

    }
}
