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
            $table->string('youtubeid'); //youtubeid
            $table->string('downloadlink'); //downloadlink
            $table->string('author');
            $table->string('singer');
            $table -> string ('imageName');

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
