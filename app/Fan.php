<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fan extends Model
{
    protected $table = 'fans';

    protected $fillable = [
    	'status','type'
    ];
}
