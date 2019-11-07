<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostReview extends Model
{
    //
    protected $fillable = [
      'post_id',
      'user_id',
      'financial_value',
      'quality',
      'comment_post',
      'comment_user',
    ];

}
