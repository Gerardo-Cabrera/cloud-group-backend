<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria = new Categoria();
        $categoria->nombre = "Interno";
        $categoria->timestamps = false;
        $categoria->save();

        $otraCategoria = new Categoria();
        $otraCategoria->nombre = "Externo";
        $otraCategoria->timestamps = false;
        $otraCategoria->save();
    }
}
