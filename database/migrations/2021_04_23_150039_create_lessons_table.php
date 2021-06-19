<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
           // $table->unsignedInteger('cource_id');
             $table->unsignedBigInteger('cource_id');
         //$table->foreignId('cource_id')->nullable()->constrained()->onDelete('set null'); 
            $table->string('name');
            $table->string('view')->nullable();
            $table->integer('duration')->nullable();
            $table->string('video');
            $table->string('thumbnail_image')->nullable();
            $table->string('file_prossesed')->nullable();

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
        Schema::dropIfExists('lessons');
    }
}
