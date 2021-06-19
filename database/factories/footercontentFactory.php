<?php

namespace Database\Factories;

use App\Models\footercontent;
use Illuminate\Database\Eloquent\Factories\Factory;

class footercontentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = footercontent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id'=>1,
            'title' => "title de footer",
            'description' =>"description de footer",
          
            'facebook' => "www.facebook.com",
            'twitter' => "www.twitter.com",
            'instagram' =>"www.instagram.com",
            'youtube'=> "www.youtube.com",
           
           
        ];
    }
}
