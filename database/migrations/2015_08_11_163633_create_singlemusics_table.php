<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSinglemusicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('singlemusics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('songtitle');
            $table->string('image');
            $table->string('imageName');
            $table->string('mp3');
            $table->string('singer');
            $table->string('language');
            $table->string('categories');
            $table->text('content');
            $table->string('author');
            $table ->integer('count');
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
        Schema::drop('singlemusics');
    }
}
