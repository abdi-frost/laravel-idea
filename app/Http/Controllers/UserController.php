<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user) {
        return view('users.show', [
            'user' => $user
        ]);
    }

    public function edit(User $user) {

        // dd($user);
        if(auth()->user()->id !== $user->id){
            abort(403);
        }

        return view('users.edit', [
            'user' => $user
        ]);
    }
}
