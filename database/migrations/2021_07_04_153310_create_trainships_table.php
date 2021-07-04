<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainships', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title')->nullable();
            $table->string('description')->nullable();
            $table->text('begundate')->nullable();
            $table->text('enddate')->nullable();
            $table->string('company')->nullable();
            $table->text('address')->nullable();
            $table->string('responsible')->nullable();
            $table->string('necessaryskills')->nullable();
            $table->unsignedInteger('user_id')->nullable(); 
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
        Schema::dropIfExists('trainships');
    }
}
