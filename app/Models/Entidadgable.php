<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entidadgable extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'entidadgable_type',
        'entidad_id'
    ];
}
