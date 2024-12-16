<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Notifications\Notifiable;

class Usuarios extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellidos',
        'correo',
        'contrasena',
        'rpe'
    ];

    protected $hidden = [
        'contrasena',
    ];

    /**
     * Configura el campo de contraseña para autenticación.
     */
    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    /**
     * Relación: Un usuario tiene muchas marcas.
     */
    public function marcas()
    {
        return $this->hasMany(Marca::class, 'usuario_id');
    }

    /**
     * Relación: Un usuario tiene muchos reportes.
     */
    public function reportes()
    {
        return $this->hasMany(Reporte::class, 'usuario_id');
    }

    /**
     * Relación: Un usuario tiene muchos formatos de entrega.
     */
    public function formatosEntrega()
    {
        return $this->hasMany(FormatoEntrega::class, 'usuario_id');
    }

    /**
     * Relación: Un usuario tiene muchos switches.
     */
    public function switches()
    {
        return $this->hasMany(switches::class, 'usuario_id');
    }
}

