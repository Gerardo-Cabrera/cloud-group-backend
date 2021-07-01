<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajadore extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellidos',
        'dni',
        'fecha_nacimiento',
        'foto',
        'usuario_id'
    ];

    public function usuario() 
    {
        return $this->hasOne('App\Models\Usuario');
    }

    public function entidades() 
    {
        return $this->morphToMany('App\Models\Entidade', 'entidadgable');
    }
}
