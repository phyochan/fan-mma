<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sends extends Model
{
    //

    protected $table = "sends";

    protected $fillable = ['name', 'songname', 'singer','email','mp3','image','approve'];
}
