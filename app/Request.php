<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    //

    protected $table = "requests";

    protected $fillable = ['name', 'songname', 'singer','email'];
}
