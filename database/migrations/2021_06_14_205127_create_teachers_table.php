<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('name')->nullable();

            $table->string('phone')->nullable();

            $table->string('sex')->nullable();

            $table->string('address')->nullable();

            $table->text('nots')->nullable();

            $table->string('photo')->nullable();

            $table->unsignedInteger('center_id')->nullable();

            $table->unsignedInteger('group_id')->nullable();
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
        Schema::dropIfExists('teachers');
    }
}
