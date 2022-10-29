<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }

    // public function follow(Request $request) {
    //     $following_id = Auth::user()->id;
    //     $followed_id = $request->input('id');

    //     \DB::table('follows')
    //     ->insert([
    //         'followed_id' => $following_id,
    //         'follow_id' => $followed_id
    //         ]);

    //         return redirect('/search');

    // }

    public function follow(User $user) {
        $follow = FollowUser::create([
            'following_id' => \Auth::user()->id,
            'followed_id' => $user->id,
        ]);
        $followCount = count(FollowUser::where('followed_id', $user->id)->get());

        return response()->json(['followCount' => $followCount]);
    }

    public function unfollow(User $user) {
        $follow = FollowUser::where('following_user_id', \Auth::user()->id)->where('followed_user_id', $user->id)->first();
        $follow->delete();
        $followCount = count(FollowUser::where('followed_user_id', $user->id)->get());

        return response()->json(['followCount' => $followCount]);
    }

}
