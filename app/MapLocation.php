<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MapLocation extends Model
{
    //

    protected $fillable = [
        'latitude',
        'longitude',
    ];
    public $timestamps = false;

}
