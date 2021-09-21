<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('user.index')->with('users', $users);
    }

    public function makeAdmin(User $user)
    {
        $user->update([
            'role' => 'admin'
        ]);
        Session::flash('success', 'User made admin successfully');
        return redirect(route('users'));
    }

    public function makeWriter(User $user)
    {
        $user->update([
            'role' => 'writer'
        ]);
        Session::flash('success', 'User made writer successfully');
        return redirect(route('users'));
    }

    public function profile()
    {
        $user = Auth::user();
    
        return view('user.profile')->with('user',$user);
    }

    public function update( UpdateProfileRequest $request)
    {
       $user = Auth::user();

        $user->update([
            'name' => $request->input('name'),
            'about'=>$request->input('about')
        ]);

        Session::flash('success', 'Profile updated successfully');
        return redirect()->back();
    }
}
