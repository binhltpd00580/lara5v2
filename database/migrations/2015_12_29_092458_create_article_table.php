<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //Create article table
    public function up()
    {

        Schema::create('articles', function(Blueprint $table){

            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('image');
            $table->enum('active', [0, 1])->default('0');
            $table->string('content');
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
        Schema::drop('articles');
    }


}
