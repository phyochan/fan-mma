<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sends', function (Blueprint $table) {
            $table->increments('id');
            $table -> string('name');
            $table -> string('songname');
            $table -> string('singer');
            $table -> text('email');
            $table -> text('mp3');
            $table -> text('image');
            $table -> string('approve');
            $table -> string('mp3filename');
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
        Schema::drop('sends');
    }
}
