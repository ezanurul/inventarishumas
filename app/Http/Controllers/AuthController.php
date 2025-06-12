<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Cari user berdasarkan email dan password (tanpa hash)
        $user = User::where('email', $request->email)
                    ->where('password', $request->password)
                    ->first();

        if ($user) {
            Auth::login($user); // Login langsung
            return redirect()->intended('/home');
        }

        // Jika tidak cocok
        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }
}
