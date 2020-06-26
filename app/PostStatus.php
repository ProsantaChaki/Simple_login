<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostStatus extends Model
{
    protected $fillable = [
        'post_id',
        'status',
        'note',
        'user_id'
    ];
    //
}
