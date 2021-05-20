<?php

namespace Database\Factories;

use App\Models\Hospital;
use Illuminate\Database\Eloquent\Factories\Factory;

class HospitalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hospital::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Community Help post','District hospital','Ward Help Post', 'City help Post']),
            'address' => $this->faker->address(),
            'contact1' => $this->faker->phoneNumber,
            'contact2' => $this->faker->phoneNumber,
            'type' => $this->faker->randomElement(['Clinic','Help Post','Hospital']),
        ];
    }
}