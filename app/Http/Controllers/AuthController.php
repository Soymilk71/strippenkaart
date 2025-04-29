<?php

namespace App\Http\Controllers;

use App\Models\Klanten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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
    public function register(Request $request)
    {
        $validated =$request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = Klanten::create($validated);
        Auth::login($user);
        return redirect('/');
    }

    public function login (Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->route('/');
        }

        throw ValidationException::withMessages([
            'data' => 'Wachtwoord of email is incorrect',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        //csrf attack protection
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
