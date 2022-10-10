<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\User;

class UsersController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|min:2|max:12',
            'mail' => ['required', 'string', 'email', 'min:5', 'max:40', Rule::unique('users')->ignore(Auth::id())],
            'password' => 'string|alpha_num|min:8|max:20|confirmed',
            'bio' => 'nullable|string|max:150',
            'images' => 'image',
        ]);
    }

    public function show(){
        $user = Auth::user();
        return view('users.profile', ['user' => $user]);
    }

    public function profile(Request $request){
        $data = $request->all();

        $user = Auth::user();
        $user->username = $request->input('username');
        $user->mail = $request->input('mail');
        $user->password = bcrypt($request->input('password'));
        $user->bio = $request->input('bio');


        $originalImg = $request->images;
        $filePath = $originalImg->store('public');
        $user->images = str_replace('public/', '', $filePath);


        $validator=$this->validator($data);
        if($validator->fails()){
            return redirect('/profile')->withErrors($validator)->withInput();
        }

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
