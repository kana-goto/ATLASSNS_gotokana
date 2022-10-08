<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UsersController extends Controller
{
    public function show(){
        $user = Auth::user();
        return view('users.profile', ['user' => $user]);
    }

    public function profile(Request $request){
        $user = Auth::user();
        $user->username = $request->input('username');
        $user->mail = $request->input('mail');
        $user->password = $request->input('password');
        $user->bio = $request->input('bio');
        $user->images = $request->input('images');
        $user->save();

        return redirect('/top');
    }




    public function search(Request $request){
        $users = User::all();
        $search = $request->input('search');
        $query = User::query();
        if ($search){
            $query = User::query();
            $users = $query->where('username', 'like', '%'.$search.'%')->get();;
        }
        return view('users.search')
        ->with([
            'users' => $users,
            'search' => $search,
            ]);
    }

    public function index() {
        $users = User::all();
        return view('users.search')->with('users', $users);
    }
}
