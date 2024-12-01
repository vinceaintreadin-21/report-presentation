<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AuthController extends Controller
{

    public function dashboard(){
        return view('welcome', ['user' => Auth::user()]);
    }

    public function registerForm(){
        return view('register');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Auth::login($user);

        return redirect('/dashboard');

    }

    public function loginForm() {
        return view('login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/login');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/login');
    }
}
