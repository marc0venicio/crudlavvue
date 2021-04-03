<?php

namespace Database\Factories;

use App\Models\Empresario;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Empresario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'tel' => $this->faker->numberBetween(1, 999),
            'city' => $this->faker->city,
            'UF' => $this->faker->stateAbbr,
            'paiempresario' =>$this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'date' => $this->faker->date($format = 'Y-m-d', $max = 'now')
        ];
    }
}
