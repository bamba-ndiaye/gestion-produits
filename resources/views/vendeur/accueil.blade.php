@extends('layouts.app')

@section('titre', 'Espace vendeur')

@section('contenu')
    <div class="carte accueil">
        <div class="emoji">🛍️</div>
        <h1>Bonjour le vendeur !</h1>
        <p>Bienvenue, {{ auth()->user()->name }}.</p>
        <p>Votre rôle : <span class="badge badge-vendeur">{{ auth()->user()->role }}</span></p>
    </div>
@endsection