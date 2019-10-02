<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'user_id',
        'title',
        'sub_title',
        'description',
        'area_id',
        'address',
        'map_location_id',
        'quality',
        'mobile',
        'status',
        'type',
        'financial_value',
    ];


}
