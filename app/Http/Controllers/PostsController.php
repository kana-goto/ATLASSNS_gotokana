<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth;

class PostsController extends Controller
{
    public function index(){
        $list = \DB::table('posts')->get();
        return view('posts.index',['list'=>$list]);
    }

    public function create(Request $request)
    {
        $post = $request->input('newPost');
        $user_id = auth()->id();
        \DB::table('posts')->insert([
            'post' => $post,
            'user_id' => $user_id
        ]);

        return redirect('/top');

    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        \DB::table('posts')
        ->where('id', $id)
        ->update(
             ['post' => $up_post]
              );

        return redirect('/top');
    }

    public function delete($id)
    {
        \DB::table('posts')
        ->where('id', $id)
        ->delete();

        return redirect('/top');
    }

}
