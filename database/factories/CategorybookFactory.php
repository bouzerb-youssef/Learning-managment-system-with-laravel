<?php

namespace Database\Factories;

use App\Models\Categorybook;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategorybookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Categorybook::class;

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
            
            'thumbnail' =>'https://loremflickr.com/320/240',
        ];
    }
}
