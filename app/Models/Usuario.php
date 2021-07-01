<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'password'
    ];

    public function trabajadore() 
    {
        return $this->hasOne('App\Models\Trabajadore');
    }
}
