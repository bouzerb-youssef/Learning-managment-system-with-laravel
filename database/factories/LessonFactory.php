<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $videos = [
            'https://www.youtube.com/watch?v=UnTQVlqmDQ0',
            'https://www.youtube.com/watch?v=z6hQqgvGI4Y',
            'https://www.youtube.com/watch?v=U8XF6AFGqlc',
            'https://www.youtube.com/watch?v=vEROU2XtPR8',
            'https://www.youtube.com/watch?v=pWbMrx5rVBE',
            'https://www.youtube.com/watch?v=Zftx68K-1D4',
            'https://www.youtube.com/watch?v=sard25VQ2HU'
        ];
    
      
        return [
            'title' => $this->faker->sentence(3),
            'Section_id' => rand(1, 200),
            'duration' => rand(1.00, 20.00),
            'video' => $videos[rand(0,6)],
        ];
    }
}
