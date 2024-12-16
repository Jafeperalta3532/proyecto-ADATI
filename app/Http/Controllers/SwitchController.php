<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\switches;
use App\Models\direccionesIp;
use Illuminate\Support\Facades\Validator;


class SwitchController extends Controller
{
    public function indexSwitch(){

        $switchs = switches::all();
        return view('switch.index', compact('switchs'));

    }

    public function createSwitch(){

        return view('switch.create');
    }

    public function showIP(switches $switch){

        $direccionesIp = $switch->direccionesIp;

        return view('addip.index', compact('switch', 'direccionesIp'));

    }
    
public function storeSwitch(Request $request){

    $validated = $request ->validate([
        'nombre' => 'required|string|regex:/^[\pL\s\-]+$/u',
        'modelo' => 'required|string',
        'direccion_ip' => 'required|ip|unique:switches,direccion_ip',
        'cantidad_puertos' => 'required|numeric',

    ],
    
    [

        
        'direccion_ip.unique' =>  'La direccion IP esta repetida',
    ]);

        $switch = new switches();
        $switch->nombre = $request->nombre;
        $switch->modelo = $request->modelo;
        $switch->direccion_ip = $request->direccion_ip;
        $switch->cantidad_puertos = $request->cantidad_puertos;
        $switch->save();

        return redirect()->route('switch.index')->with('exito', 'El switch ha sido agregado con exito');

}


public function destroySwitch(switches $switch){

    $switch -> direccionesIp() -> delete();

    $switch -> delete();

    return redirect()->route('switch.index')->with('El switch ha sido borrado exitosamente');
}
}
