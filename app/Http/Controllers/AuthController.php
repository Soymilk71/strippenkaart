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
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:klanten,email',
            'password' => 'required|string|min:45|confirmed',
        ]);
    
        $user = Klanten::create([
            'voornaam' => $validated['firstname'],
            'achternaam' => $validated['lastname'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            //voor nu zetten we de velden op null, dit kan later aangepast worden in de klantpersoonlijke pagina,
            //ik wil nu de basis gegevens hebben voor de klant zodat zij haar account kan aanmaken en uren kan kopen.
            'aantal_uren' => null,
            'is_admin' => null,
            'bedrijf' => null,
            'remember_token' => null,

        ]);
    
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
            return redirect()->route('home');
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
