<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use App\Post;
use Auth;

class FollowsController extends Controller
{
    public function followList(){
        // $users = User::all()->follows()->pluck('followed_id');
        // return view('follows.followList')->with('users', $users);
        $following_id = Auth::user()->follows()->pluck('followed_id');
        $users = \DB::table('users')->whereIn('id', $following_id)->get();
        $posts = Post::with('user')->whereIn('user_id', $following_id)->get();

        return view('follows.followList', compact('users','posts'));


    }
    public function followerList(){
        // $users = User::all();
        // return view('follows.followerList')->with('users', $users);

        $followed_id = Auth::user()->followUsers()->pluck('following_id');
        $users = \DB::table('users')->whereIn('id', $followed_id)->get();
        $posts = Post::with('user')->whereIn('user_id', $followed_id)->get();

        return view('follows.followerList', compact('users','posts'));

    }


    public function follow(User $user) {
        // $follow = Follow::create([
        //     'following_id' => \Auth::user()->id,
        //     'followed_id' => $user->id,
        // ]);

        // return redirect('/search');

        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if(!$is_following) {
            // フォローしていなければフォローする
            $follower->follow($user->id);
            return back();
        }
    }

    public function unfollow(User $user) {
        // $follow = Follow::where('following_id', \Auth::user()->id)->where('followed_id', $user->id)->first();
        // $follow->delete();

        // return redirect('/search');

        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if($is_following) {
            // フォローしていればフォローを解除する
            $follower->unfollow($user->id);
            return back();
        }
    }

    public function profile($id){
        $users = \DB::table('users')->where('id', $id)->get();
        $posts = Post::with('user')->where('user_id', $id)->get();
        return view('users.user_profile', compact('users','posts'));
    }

}
