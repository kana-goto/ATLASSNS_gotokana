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
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // フォロワーを取得
    public function followUsers()
    {
        return $this->belongsToMany(
            'App\User',
            'follows',
            'followed_id',
            'following_id'
        );
    }

    // フォローしているユーザーを取得
    public function follows()
    {
        return $this->belongsToMany(
            'App\User',
            'follows',
            'following_id',
            'followed_id'
        );
    }

    public function posts()
    {
        return $this->hasMany(
            'App\Post',
        );
    }

}
