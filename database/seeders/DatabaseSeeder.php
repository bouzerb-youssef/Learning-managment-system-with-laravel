<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Lesson;
use App\Models\Cource;
use App\Models\Section;
use App\Models\whatinthecoure;
use App\Models\Categorybook;
use App\Models\Book;
use App\Models\Question;
use App\Models\Option;
use App\Models\footercontent;
use App\Models\content;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DatabaseSeeder extends Seeder
{
    
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      /* 
       User::factory(10)->create();
      Category::factory(5)->create();
        Lesson::factory(30)->create();
        Cource::factory(10)->create(); */
    
      
       //  User::factory(10)->create();
      //Category::factory(2)->create();
     //  Cource::factory(4)->create(); 

    //  Section::factory(200)->create();
    //  Lesson::factory(1200)->create();
     // whatinthecoure::factory(300)->create();
      //Categorybook::factory(10)->create();
     // Book::factory(100)->create();
     // Question::factory(40)->create();
     // Option::factory(160)->create();
    content::factory(1)->create();
     footercontent::factory(1)->create();

    }

}
