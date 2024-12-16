<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth; // Necesario para el login

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('user.register');
    }

    public function register (Request $request){
         $request -> validate([
            'nombre' => 'required|max:50|regex:/^[\pL\s\-]+$/u',
            'apellidos' => 'required|max:50|regex:/^[\pL\s\-]+$/u',
            'correo' => 'required|email|unique:usuarios,correo',
            'contrasena' => 'required|confirmed|min:6',
            'rpe' => 'required|unique:usuarios,rpe',
            


        ],[

            'nombre.required' => 'El nombre es un campo obligatorio',
            


        ]);
        //funcion para crar el usuario
        Usuarios::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'correo' => $request->correo,
            'contrasena' => Hash::make($request->contrasena), // el metodo hash es para encriptar la contraseña
            'rpe' => $request->rpe,
        ]);

        // Redirigir al formulario de login con un mensaje de éxito
        return redirect()->route('login')->with('success', 'Usuario registrado exitosamente');
    }

    // Mostrar el formulario de login
    public function showLoginForm()
    {
        return view('user.login'); 
    }
        //funcion para enviar datos del login
    public function login(Request $request)
    {
        $request->validate([
            'rpe' => 'required|string',
            'contrasena' => 'required|min:6', 
        ]);

        $usuario = Usuarios::where('rpe', $request->rpe)->first();
    
        if (!$usuario || !Hash::check($request->contrasena, $usuario->contrasena)) {
            return back ()->withErrors(['rpe' => 'Correo o R.P.E incorrecto',]);
            //Sino se encuentra el usuario o la contraseña es incorrecta, se redirige a la vista de login con un mensaje de error
        }

        Auth::login($usuario);
        //contraseña o correo correcto, redirige al dashboard

        return redirect()->route('menu')->with('success', 'Bienvenido de nuevo, ' . $usuario->nombre . ' ' . $usuario->apellidos);
    }


    public function showDashboard(){
    
        return view ('dashboard.menu');
    }


    
}
