<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'newPost' => 'required|string|min:1|max:200',
            'upPost' => 'required|string|min:1|max:200',
        ]);
    }

    public function index(){
        // $following_id = Auth::user()->follows()->pluck('followed_id');
        // $posts = Post::with('user')->whereIn('user_id', $following_id)->get();
        // $users = Auth::user()->get();

        $posts = Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('followed_id'))->orWhere('user_id', Auth::user()->id)->latest()->get();

        return view('posts.index', compact('posts'));
    }


    public function create(Request $request)
    {
        $data = $request->input();
        $post = $request->input('newPost');
        $validator=$this->validator($data);

        if($validator->fails()){
            return redirect('/top')->withErrors($validator)->withInput();
        }


        $user_id = auth()->id();
        \DB::table('posts')->insert([
            'post' => $post,
            'user_id' => $user_id
        ]);

        return redirect('/top');

    }

    public function update(Request $request)
    {
        $data = $request->all();
        $id = $request->input('id');
        $up_post = $request->input('upPost');

         $validator=$this->validator($data);
        if($validator->fails()){
            return redirect('/top')->withErrors($validator)->withInput();
        }

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
