<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('options', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('option');
            $table->string('image');
            $table->integer('points')->nullable()->default(0);

            $table->unsignedInteger('question_id');
          
            //$table->foreignId('question_id')->constrained()->onDelete('set null'); 
          //  $table->foreign('question_id')->references('id')->on('questions')
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
        Schema::dropIfExists('options');
    }
}
