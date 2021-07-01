<?php

namespace Database\Factories;

use App\Models\Entidade;
use Illuminate\Database\Eloquent\Factories\Factory;

class EntidadeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Entidade::class;

    private function generarIdentificador()
    {
        $only_letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $get_letter = substr(str_shuffle($only_letters), 0, 1);
        $get_number = rand(10e8, 10e9);
        $identificador = $get_letter . $get_number;
        return $identificador;
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->randomElement(['Madrid', 'Barcelona', 'Sevilla', 'Valencia', 'San Sebastián', 'Bilbao', 'Andalucía', 'Asturias', 'Islas Canarias']),
            'identificador' => $this->generarIdentificador(),
        ];
    }
}
