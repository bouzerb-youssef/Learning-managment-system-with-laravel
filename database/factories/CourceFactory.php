<?php

namespace Database\Factories;

use App\Models\Cource;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cource::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4),
            'short_description' => $this->faker->realText(100),
            'description'=> $this->faker->realText(400),
            'level' => 'Beginner',
            'thumbnail' => "https://picsum.photos/200/100",
            'visibility' => true,
            'category_id' => rand(1, 2)
        ];
    }
}
