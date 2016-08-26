<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Maintexts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintexts', function($table) {
            $table->increments('id');
            $table->string('name',32);
            $table->text('body');
            $table->string('url',32);
            $table->enum('showhide', array('show', 'hide'))->default('show');
            $table->enum('lang', array('ru', 'en'))->default('ru');
            $table->timestamps();
            /*$table->float();
            $table->date();
            $table->blob();
            $table->integer();  */          
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('maintexts');
    }
}
