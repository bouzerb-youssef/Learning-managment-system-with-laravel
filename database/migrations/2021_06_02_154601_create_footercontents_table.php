<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootercontentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footercontents', function (Blueprint $table) {
         
            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            

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
        Schema::dropIfExists('footercontents');
    }
}
