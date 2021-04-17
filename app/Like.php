<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
  // 「１対１」→ メソッド名は単数形
  Public function user()
  {
    return $this->belongsTo('App\User');
  }
  // ==========ここから追加する==========
  // 「１対１」→ メソッド名は単数形
  Public function post()
  {
    return $this->belongsTo('App\Post');
  }
  // ==========ここまで追加する==========
}