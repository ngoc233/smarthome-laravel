<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandHumidity extends Model
{
    protected $table = 'landHumiditys';

    protected $fillable = [
    	'number'
    ];
}
