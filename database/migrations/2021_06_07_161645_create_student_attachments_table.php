<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_attachments', function (Blueprint $table) {
            $table->increments('id');

            $table->string('genre')->nullable();

            $table->string('file')->nullable();

            $table->unsignedInteger('user_id')->nullable();
            
            //$table->foreign('user_id')->references('id')->on('users')

       //  ->onDelete('cascade'); 
          
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
        Schema::dropIfExists('student_attachments');
    }
}
