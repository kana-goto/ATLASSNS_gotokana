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
        'username', 'mail', 'password','images',
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

    // フォローする
    public function follow(Int $user_id) {
        return $this->follows()->attach($user_id);
    }

    // フォロー解除する
    public function unfollow(Int $user_id){
        return $this->follows()->detach($user_id);
    }

    // フォローしているか
    public function isFollowing(Int $user_id){
        return (boolean) $this->follows()->where('followed_id', $user_id)->first();
    }

    // フォローされているか
    public function isFollowed(Int $user_id){
        return (boolean) $this->followUsers()->where('following_id', $user_id)->first();
    }



}
