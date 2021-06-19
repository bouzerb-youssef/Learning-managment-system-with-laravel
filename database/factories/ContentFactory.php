<?php

namespace Database\Factories;

use App\Models\content;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = content::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
            return [
                'id'=>1,
                'title1' => "title de seection1",
                'description1' =>"description de section1",
                'hero_image1'=> "home-hero.png",
                'button1' => "description de section1",
                /* section2 */
                'title2' => "description de section2",
                'description2' =>"description de section2",
                'image2'=> "feature.png",
                'button2' => "description de section2",
                /* section 3 */
                'title3' => "title de section3",
                'description3' =>"description de section3",
                'button3'=> "button de section3",
               
            ];
        
    }
}
