<?php

namespace Database\Factories;

use App\Models\Endorser;
use Illuminate\Database\Eloquent\Factories\Factory;

class EndorserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Endorser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstNameMale .' '. $this->faker->lastName,
            'farm' => strtoupper($this->faker->word .' FARM'),
            'email' => $this->faker->unique()->safeEmail,
            'address' => $this->faker->unique()->address,
            'contact' => $this->faker->unique()->phoneNumber,
            'fb' => $this->faker->unique()->userName,
            'ig' => $this->faker->unique()->userName,
            'national' => 1,
        ];
    }
}
