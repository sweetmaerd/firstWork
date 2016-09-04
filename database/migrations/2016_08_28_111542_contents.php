<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Contents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('contents', function ($table) {
            $table->increments('id');
            $table->string('title', 120);
            $table->text('description');
            //$table->boolean('topical');
            $table->text('img');
            $table->string('url', 120);
            $table->string('categories_id');
            //$table->foreign('categories_id')->references('id')->on('categories');
            $table->dateTime('date');
            $table->string('author',30);
            $table->enum('showhide', array('show', 'hide'))->default('show');
            $table->enum('lang', array('ru', 'en'))->default('ru');
            $table->string('_token');
            $table->rememberToken();
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
        Schema::drop('contents');
    }
}
