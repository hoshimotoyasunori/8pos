<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
// 「１対１」→ メソッド名は単数形
  Public function user()
  {
    return $this->belongsTo('App\User');
  }
  // 「１対１」→ メソッド名は単数形
  Public function post()
  {
    return $this->belongsTo('App\Post');
  }
}
