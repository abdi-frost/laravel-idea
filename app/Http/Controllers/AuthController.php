<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function store(){
        $validated = request()->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8|max:32'
        ]);

        // dump(request()->all());
        // dd($validated);
   
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        return redirect()->route('dashboard')->with('success', 'Acount created successfully');
    }

    public function login() {
        return view('auth.login');
    }

    public function authenticate() {
        // dd(request()->all());

        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt($validated)){
            return redirect()->route('dashboard')->with('success', 'logged in successfully');
        }

        return redirect()->route('login')->withErrors([
            'email' => 'wrong username or password'
        ]);
    }

    public function logout() {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('dashboard');
    }
}
