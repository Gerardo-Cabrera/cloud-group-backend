<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuestosLaborale extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'importancia',
        'es_jefe',
        'categoria_id'
    ];

    public function categoria() 
    {
        return $this->belongsTo('App\Models\Categoria');
    }

    public function entidades() 
    {
        return $this->morphToMany('App\Models\Entidade', 'entidadgable');
    }
}
