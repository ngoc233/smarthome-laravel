<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pump extends Model
{
    protected $table = 'pumps';

    protected $fillable = [
    	'number',
    ];
}
