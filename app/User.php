<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //hasMany設定
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    // ==========ここから追加する==========
    //hasMany設定
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    // ==========ここまで追加する==========
    //hasMany設定
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}