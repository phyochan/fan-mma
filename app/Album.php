<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //
    protected $table = "albums";

    protected $fillable = ['title', 'photo', 'mp3','content'];
}
