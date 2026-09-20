<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function register(Request $request): RedirectResponse 
    {
        $validated = $request->validate([
            // 'username' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'role' => ['required', 'string']
        ], [
        'email.unique' => 'อีเมลนี้ถูกลงทะเบียนไปแล้ว'
        ]);   
        

        User::create([
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => 'student',
        ]);


        return redirect()->route('login')->with('success','Register Successfully');
    }
    
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ]);  

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->route('intern.intern');
        }

        return redirect()->back()
            ->withErrors(['email' => 'อีเมลหรือรหัสผ่านไม่ถูกต้อง'])
            ->withErrors(['password' => 'อีเมลหรือรหัสผ่านไม่ถูกต้อง'])
            ->withInput();
    }

    public function logout(Request $request): RedirectResponse 
    {
            Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->back();
    }
}
