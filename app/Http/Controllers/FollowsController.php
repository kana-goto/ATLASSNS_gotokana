<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;

class FollowsController extends Controller
{
    public function followList(){
        $users = User::all();

        return view('follows.followList')->with('users', $users);
    }
    public function followerList(){
        $users = User::all();
        return view('follows.followerList')->with('users', $users);
    }


    public function follow(User $user) {
        $follow = Follow::create([
            'following_id' => \Auth::user()->id,
            'followed_id' => $user->id,
        ]);

        return redirect('/search');
    }

    public function unfollow(User $user) {
        $follow = Follow::where('following_id', \Auth::user()->id)->where('followed_id', $user->id)->first();
        $follow->delete();

        return redirect('/search');
    }

}
