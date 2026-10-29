<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view ('auth.register');
    }

    public function storeRegister(Request $request)
    {
                $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'vendeur',
        ]);

        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->route('tableau-de-bord');

    }

      // Afficher le formulaire de connexion
    public function login()
    {
        return view('auth.login');
    }

    // Vérifier les identifiants
    public function storeLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('tableau-de-bord');
        }

        return back()
            ->withErrors(['email' => 'Adresse e-mail ou mot de passe incorrect.'])
            ->onlyInput('email');
    }

    // Rediriger selon le rôle
    public function tableauDeBord()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('produits.index');
        }

        if ($user->role === 'vendeur') {
            return redirect()->route('vendeur.accueil');
        }

        abort(403);
    }

    // Déconnecter l'utilisateur
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('connexion');
    }
}

