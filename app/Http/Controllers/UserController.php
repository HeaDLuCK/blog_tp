<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (auth()->attempt(collect($request)->only(['email', 'password'])->toArray())) {
            session()->flash('login_succ', "Hi $user->name");
            return redirect()->route('blog.index');
        } else {
            session()->flash('login_error', 'failed to login check your email/password');
            return back()->withInput();
        }
    }
    function logout()
    {
        Auth::logout();
        return redirect()->route('blog.index');
    }
}
