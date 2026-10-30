@extends('layouts.app')

@section('titre', 'Inscription')

@section('contenu')
    <div class="carte carte-auth">
        <h1>Créer un compte</h1>
        <p class="sous-titre">Rejoignez la plateforme en quelques secondes.</p>

        @if ($errors->any())
            <div class="alerte alerte-erreur">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('inscription.store') }}" method="POST">
            @csrf

            <div class="champ">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="champ">
                <label for="email">Adresse e-mail</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="champ">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="champ">
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-primaire">S'inscrire</button>
        </form>

        <p class="lien-bas">
            Vous avez déjà un compte ?
            <a href="{{ route('connexion') }}">Se connecter</a>
        </p>
    </div>
@endsection