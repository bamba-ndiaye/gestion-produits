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

}

