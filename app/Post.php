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
        'category_id',
        'map_location_id',
        'quality',
        'mobile',
        'post_status',
        'post_type',
        'post_condition',
        'financial_value',
    ];


}
