<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()

    {
        $text = $this->faker->sentence(1);

        return [
            'title' => $text,
            'slug' =>$text,
            'thumbnail' =>'https://loremflickr.com/320/240',
        ];
    }
}
