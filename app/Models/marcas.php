<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class marcas extends Model
{

    protected $table= "marcas";
    protected $primaryKey= "id";

    public $timestamps = false;

    protected $fillable= [
        'nombre',
        'descripcion',

    ];

    public function Usuarios(){

        return $this->belongsTo(Usuarios::class,'usuario_id');
    }

    public function piezas(){

        return $this->hasMany(piezas::class,'marca_id');
    }

}
