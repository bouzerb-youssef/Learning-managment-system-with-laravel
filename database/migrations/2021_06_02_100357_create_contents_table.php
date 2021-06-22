<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {

            $table->id();
            /* section 1  */
            $table->text('title1')->default("title de seection1");
            $table->text('description1')->default("description de section1");
            $table->string('hero_image1')->nullable("home-hero.png");
            $table->string('button1')->default("description de section1");
                /* section2  */
            $table->text('title2')->default("description de section2");
            $table->text('description2')->default("description de section2");
            $table->string('image2')->nullable("feature.png");
            $table->string('button2')->default("description de section2");
                /* section 2  */
            $table->text('title3')->default("title de section3");
            $table->text('description3')->default("description de section3");
            $table->string('button3')->default("button de section3");

            $table->timestamps();
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
