<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserActivities extends Model
{
    //
    protected $fillable = [
        'user_id',
        'post_id',
        'created',
        'interested',
        'received',
        'verified',
    ];

    public function post()
    {
        return $this->hasOne('App\Post','id','post_id');
    }
}
