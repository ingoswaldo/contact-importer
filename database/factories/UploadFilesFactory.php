<?php

namespace Database\Factories;

use App\Models\UploadFile;
use Illuminate\Database\Eloquent\Factories\Factory;

class UploadFilesFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UploadFile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id'      => $this->faker->randomDigit(),
            'url'          => $this->faker->filePath(),
            'column_names' => $this->faker->randomElements(),
            'status'       => $this->faker->randomElement(['On Hold', 'Processing', 'Failed', 'Finished']),
            'log'          => $this->faker->text
        ];
    }
}
