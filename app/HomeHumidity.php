<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeHumidity extends Model
{
    protected $table = 'homeHumiditys';

    protected $fillable = [
    	'number'
    ];
}
