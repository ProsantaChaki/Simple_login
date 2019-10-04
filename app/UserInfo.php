<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    //

    protected $fillable = [
        'user_id',
        'area_id',
        'address',
        'map_location_id',
        'blood_group',
        'birthday',
        'occupation',
        'description',
        'photo_id',
        'weight',
        'active_status',
        'marital_status',
        'gender'
    ];

    public $timestamps = false;


}
