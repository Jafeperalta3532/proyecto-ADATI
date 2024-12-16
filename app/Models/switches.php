<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class switches extends Model
{
    protected $table = 'switches'; // Opcional si sigue la convención de Laravel
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'direccion_ip',
        'modelo',
        'cantidad_puertos',
    ];

    // Relación con usuarios
    public function Usuarios()
    {
        return $this->belongsTo(Usuarios::class, 'usuario_id');
    }

    // Relación con direcciones IP
    public function direccionesIp()
    {
        return $this->hasMany(direccionesIp::class, 'switch_id');
    }
}
