<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMtvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mtvs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('songtitle');
            $table->string('image');
            $table->string('mp3'); //youtubeid
            $table->string('categories'); //downloadlink
            $table->string('author');
            $table->string('singer');
            $table -> string ('imagefilename');

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
        Schema::drop('mtvs');
    }
}
