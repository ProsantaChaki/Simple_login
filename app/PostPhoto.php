<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostPhoto extends Model
{
    //
    protected $fillable = [
        'post_id',
        'photo_id',
        ];

    public function photo(){
        return $this->belongsTo('App\Photo', 'photo_id', 'id');
    }
}
