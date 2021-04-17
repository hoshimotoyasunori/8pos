<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  // 「１対１」→ メソッド名は単数形
  Public function user()
  {
    return $this->belongsTo('App\User');
  }
  //hasMany設定
  public function likes()
  {
    return $this->hasMany('App\Like');
  }
  // ==========ここから追加する==========
  Public function likedBy($user)
  {
    return Like::where('user_id', $user->id)->where('post_id', $this->id);
  }
  // ==========ここまで追加する==========
  //hasMany設定
  public function comments()
  {
    return $this->hasMany('App\Comment');
  }
}