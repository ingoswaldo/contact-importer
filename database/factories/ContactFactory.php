<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id'        => $this->faker->randomDigitNotZero(),
            'upload_file_id' => $this->faker->randomDigitNotZero(),
            'name'           => $this->faker->name,
            'email'          => $this->faker->unique()->safeEmail(),
            'birthdate'      => $this->faker->dateTime,
            'phone'          => $this->faker->phoneNumber,
            'address'        => $this->faker->address,
            'credit_card'    => $this->faker->creditCardNumber,
            'franchise'      => $this->faker->creditCardType,
        ];
    }
}
