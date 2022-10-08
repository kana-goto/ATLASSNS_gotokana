<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UsersController extends Controller
{
    //
    public function profile(){
        $user = Auth::user();
        return view('users.profile', ['user' => $user]);
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
