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
        return view('auth.register');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function showLoginAdmin()
    {
        return view('auth.loginadmin');
    }

    public function register(Request $request): RedirectResponse 
    {
        $validated = $request->validate([
            // 'username' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string']
        ], [
        'email.unique' => 'อีเมลนี้ถูกลงทะเบียนไปแล้ว',
        'email.email' => 'รูปแบบอีเมลไม่ถูกต้อง'
        ]);   

        // if (Auth::attempt($validated)) {
        //     return redirect()->back();
        // };

        User::create([
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => $validated['role'],
        ]);


        return redirect()->route('login')->with('success','Register Successfully');
    }
    
    public function login(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ], [
        'email.email' => 'รูปแบบอีเมลไม่ถูกต้อง'
        ]);  

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->route('index');
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

    public function loginAdmin(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required','string']
        ]);

        if (Auth::validate($validated)) {

            $user = User::where('email', $request->email)->first();

            if ($user->role !== 'admin') { 
                return redirect()->back()
                ->withErrors([
                    'email' => 'คุณไม่มีสิทธิ์เข้าใช้งานในส่วนนี้ (เฉพาะ Admin เท่านั้น)',
                ]);
            }

            Auth::login($user);
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return redirect()->back()
        ->withErrors([ 
            'email' => 'อีเมลหรือรหัสผ่านไม่ถูกต้อง',
            'password' => 'อีเมลหรือรหัสผ่านไม่ถูกต้อง'
        ]);
    }
}
