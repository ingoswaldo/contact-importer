<?php

namespace Database\Factories;

use App\Models\CreditCardType;
use Illuminate\Database\Eloquent\Factories\Factory;

class CreditCardTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CreditCardType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->creditCardType,
            'inn_ranges' => $this->faker->randomElements,
            'length_ranges' => $this->faker->randomDigitNotZero(),
        ];
    }
}
