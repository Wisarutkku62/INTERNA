<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        
        $user = new User();

        $user->username = $validated['username'];
        $user->password = $validated['password'];
        $user->role = $validated['role'];
        $user->save();

        return redirect()->route('auth.showLogin');
    }
    public function showLogin();
    {
        return view('auth.showLogin')
    }
    public function login();
    {
        return view('Index')
    }
}
