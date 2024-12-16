<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\direccionesIp;
use App\Models\switches;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class DireccionesipController extends Controller
{


    public function indexDireccionesIp($switchId)
    {
        // Obtener el switch por su ID
        $direcciones_ip = direccionesIp::where('switch_id', $switchId)->get(); // Cambiado a 'direcciones_ip'
        $switch = switches::findOrFail($switchId);
    
    
        return view('addip.index', compact('switch', 'direcciones_ip'));
    }

    public function createDireccionesIp($switchId)
    {
        $switch = switches::findOrFail($switchId);
        return view('addip.create', compact('switch'));
    }

    public function storeDireccionesIp(Request $request, $switchId)
    {
        $validated = $request ->validate([
            'puerto_numero' => 'required|numeric',
            'direccion_ip' => 'required|string|ip|unique:direcciones_ip,direccion_ip',
            'estado' => 'required|string',
        ],
        
        [

            
            'direccion_ip.unique' =>  'La direccion IP esta repetida',
        ]);

           // Verificar si el puerto está repetido dentro del mismo switch
    $puertoRepetido = direccionesIp::where('switch_id', $switchId)
    ->where('puerto_numero', $request->puerto_numero)
    ->exists();

if ($puertoRepetido) {
    return redirect()->route('addip.index', $switchId)
        ->withErrors(['puerto_numero' => 'El número de puerto ya está asignado a este switch.'])
        ->withInput();
}
        
        // Obtener el switch y verificar si se puede asignar más puertos
        $switch = switches::findOrFail($switchId);
        $cantidadAsignada = direccionesIp::where('switch_id', $switchId)->count();
        
    
        // Verificar si ya se alcanzó el límite de puertos
        if ($cantidadAsignada >= $switch->cantidad_puertos) {
            // Si alcanzamos el límite de puertos, redirigir con un error
            return redirect()->route('addip.index', $switchId)
            ->with('error', 'El switch ha alcanzado el límite de puertos.');
        }
        
        // Si el límite no se ha alcanzado, proceder con la creación del puerto
         $direcciones_ip = new direccionesIp();
            $direcciones_ip -> puerto_numero = $request -> puerto_numero;
            $direcciones_ip -> direccion_ip = $request -> direccion_ip;
            $direcciones_ip -> estado = $request -> estado;
            $direcciones_ip -> switch_id = $switchId;
            $direcciones_ip -> save();

         /** 
        * ([
            *'puerto_numero' => $request->puerto_numero,
            *'direccion_ip' => $request->direccion_ip,
            *'estado' => $request->estado,
            *'switch_id' => $switchId, // Asociamos la dirección IP con el switch
        *]);
        */
        
        // Redirigir con éxito
        return redirect()->route('addip.index', $switchId)
        ->with('Dirección IP agregada exitosamente.');
    }

    public function destroyDireccionesIp($switchId, direccionesIp $direccionesIp)
{


    $direccionesIp->delete();
    return redirect()->route('addip.index', $switchId)->with('Dirección IP eliminada exitosamente.');
}

}