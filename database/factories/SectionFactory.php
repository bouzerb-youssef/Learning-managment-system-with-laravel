<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

class SectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Section::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'section' => $this->faker->sentence(2),
            'cource_id' =>rand(1, 40),
            'description'=> $this->faker->realText(400),
            'material' => "https://www.soundczech.cz/temp/lorem-ipsum.pdf",
        ];
    }
}
