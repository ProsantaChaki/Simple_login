<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //
    public $timestamps = false;

    public function post(){
        return $this->belongsTo('App\Post', 'area_id', 'id');
    }

}
