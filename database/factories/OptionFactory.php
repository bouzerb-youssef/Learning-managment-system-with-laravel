<?php

namespace Database\Factories;

use App\Models\Option;
use Illuminate\Database\Eloquent\Factories\Factory;

class OptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Option::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'option' => $this->faker->sentence(2),
            'points' => rand(0,1),

            'question_id' => rand(1,40)
        ];
    }
}
