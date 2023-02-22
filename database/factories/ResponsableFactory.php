<?php

namespace Database\Factories;

use App\Models\Responsable;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResponsableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Responsable::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
     
            'nom'=>$this->faker->firstName,
            'prenom'=>$this->faker->lastName,
            'Email'=>$this->faker->email,
            'telephone'=>$this->faker->numberBetween(1000000,1000000)
        ];
    }
}
