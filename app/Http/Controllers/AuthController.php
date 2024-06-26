<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }
    public function auth(Request $request)
    {
            $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
          
            if(Auth::user()->role == 'admin'){
                return redirect('/dashboard');
            }
            if(Auth::user()->role == 'users'){
                return redirect('/news');
            }
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }
    public function authRegister(Request $request){
        $credentials = $request->validate([
            'username' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        User::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => 'users'
        ]);
        if (Auth::attempt($credentials)) {
            return redirect('/news');
        }
    }
    public function logout(Request $request)
    {
     Auth::logout();
     $request->session()->invalidate();
     $request->session()->regenerateToken();
     return redirect('/login');
    }
}
