<?php

namespace Database\Factories;

use App\Models\whatinthecoure;
use Illuminate\Database\Eloquent\Factories\Factory;

class whatinthecoureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = whatinthecoure::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'detail' => $this->faker->sentence(4),
            'cource_id' => rand(1,40),
        ];
    }
}
