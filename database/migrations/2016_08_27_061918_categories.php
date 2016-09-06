<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Categories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function ($table) {
            $table->increments('id');
            $table->integer('parent_id');
            $table->string('name', 20);
            $table->string('alias', 20);
            $table->enum('showhide', array('show', 'hide'))->default('show');
            $table->enum('lang', array('ru', 'en'))->default('ru');
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
        Schema::drop('categories');
    }
}
