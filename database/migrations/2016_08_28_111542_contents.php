<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Auth;

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
            $table->string('img')->default('default.jpg');
            $table->string('url', 120);
            $table->integer('categories_id');
            $table->string('author',30);
            $table->enum('showhide', array('show', 'hide'))->default('show');
            $table->enum('lang', array('ru', 'en'))->default('ru');
            $table->rememberToken();
            $table->timestamps();
            $table->string('_token')->nullable();
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
