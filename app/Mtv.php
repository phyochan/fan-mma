<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mtv extends Model
{
     protected $table = "mtvs";

    protected $fillable = ['songtitle','download','youtubeid'];
}
