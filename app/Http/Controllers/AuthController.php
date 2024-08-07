<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function login_act(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->only(['email', 'password']))) {
            $request->session()->regenerate();

            if (Auth::user()->role == 'admin') {
                return redirect()->intended('/dashboard');
            } elseif (Auth::user()->role == 'customer') {
                return redirect()->intended('/');
            }
        }

        return back()->withErrors([
            'email' => __('auth.failed'),
        ]);

    }

    public function register()
    {
        return view('auth.register');
    }

    public function register_act(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()->symbols()->mixedCase()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer'
        ]);

        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}