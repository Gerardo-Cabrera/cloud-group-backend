<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entidade extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'identificador'
    ];

    public function puestosLaborales() 
    {
        return $this->morphedByMany('App\Models\PuestosLaborale', 'entidadgable');
    }

    public function trabajadores() 
    {
        return $this->morphedByMany('App\Models\Trabajadore', 'entidadgable');
    }
}
