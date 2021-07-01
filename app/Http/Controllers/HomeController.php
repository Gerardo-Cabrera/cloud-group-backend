<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Método __invoke para crear una ruta única
    public function __invoke() 
    {
        return view('welcome');
    }
}
