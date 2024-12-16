<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class direccionesIp extends Model
{
    protected $table = 'direcciones_ip';
    protected $primaryKey = 'id';

    protected $fillable = [
        'puerto_numero',
        'direccion_ip',
        'estado',
        'switch_id',  // Asegúrate de incluir el campo switch_id
    ];

    // Relación con el modelo Switch
    public function switches()
    {
        return $this->belongsTo(switches::class, 'switch_id', 'id'); // Relación "pertenece a"
    }
}
