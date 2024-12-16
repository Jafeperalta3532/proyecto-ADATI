<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class piezas extends Model
{
    protected $table = 'piezas';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'marca_id',
        'stock',
        'descripcion',
        'tipo',
        'fecha_registro',

    ];

    public function marcas(){
        return $this->belongsTo(marca::class,'marca_id');
    }

}
