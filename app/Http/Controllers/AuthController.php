<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function index(){
        return view("login");
    }
    public function showForm(){
        return view("register");
    }

 

    public function stor(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        Session::flash('success', 'Registration successful. Please login.');

        return redirect()->route('login');
    }




    public function login(Request $request){
    $donnerUser = $request->only('email', 'password');
    if (Auth::attempt($donnerUser)) {
        $user = Auth::user();
        session(['user_id' => $user->id, 'user_name' => $user->name]);
        if ($user->role === 'admin') {
            return redirect()->route('show.books');
        } else {
            return redirect()->route('show.books.user');
        }
    }

    return redirect()->route('login')->with('error', 'Invalid email or password.');
}

}
