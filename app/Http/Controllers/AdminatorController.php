<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminatorController extends Controller
{
    public function index()
    {
        return view('adminator.index');
    }

    public function formLogin()
    {
        return view('adminator.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('adminator.index');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }
}
