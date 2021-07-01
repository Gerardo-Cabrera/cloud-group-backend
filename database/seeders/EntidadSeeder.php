<?php

namespace Database\Seeders;

use App\Models\Entidade;
use Illuminate\Database\Seeder;

class EntidadSeeder extends Seeder
{    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Entidade::factory(9)->create();
    }
}
