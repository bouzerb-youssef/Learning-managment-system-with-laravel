<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('age');
            $table->string('phone');
            $table->string('sex');
            $table->string('cin');
            $table->string('familySituation');
            $table->string('childrenNmb');
        
            $table->string('educationLevel');
            $table->string('address');
            $table->text('nots');
            $table->string('photo');
            $table->unsignedInteger('studentGroup_id')->nullable();
             // $table->foreign('category_id')->references('id')->on('categories')

          //  ->onDelete('set null'); 
          
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
        Schema::dropIfExists('students');
    }
}
