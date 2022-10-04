<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
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
