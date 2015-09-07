<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SingleMusic extends Model
{
    //

    protected $table = "singlemusics";

    protected $fillable = ['title', 'image', 'mp3','mtv','language','categories','content'];


}
