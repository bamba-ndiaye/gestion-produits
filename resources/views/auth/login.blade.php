@extends('layouts.app')

@section('titre', 'Connexion')

@section('contenu')
    <div class="carte carte-auth">
        <h1>Bon retour 👋</h1>
        <p class="sous-titre">Connectez-vous pour accéder à votre espace.</p>

        @if ($errors->any())
            <div class="alerte alerte-erreur">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('connexion.store') }}" method="POST">
            @csrf

            <div class="champ">
                <label for="email">Adresse e-mail</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="champ">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primaire">Se connecter</button>
        </form>

        <p class="lien-bas">
            Vous n'avez pas encore de compte ?
            <a href="{{ route('inscription') }}">S'inscrire</a>
        </p>
    </div>
@endsection