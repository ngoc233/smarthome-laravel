<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Light extends Model
{
    protected $table = 'lights';

    $fillable = [
    	'status','type'
    ];
}
