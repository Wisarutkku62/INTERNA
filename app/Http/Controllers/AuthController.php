<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.showRegister');
    }
    public function register(Request $request): RedirectResponse 
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:50'],
            'password' => ['required', 'string'],
            'role' => ['required', 'string']
        ]);   
        
        $user = User::create($validated);

        Auth::login($user);

        return redirect()->route('auth.showLogin');
    }
    public function showLogin()
    {
        return view('auth.showLogin');
    }
    public function login()
    {
        return view('Index');
    }
}
