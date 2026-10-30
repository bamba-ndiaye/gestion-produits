@extends('layouts.app')

@section('titre', 'Liste des produits')

@section('contenu')
    <div class="carte">
        <h1>Espace administrateur</h1>
        <p class="sous-titre">Bonjour, {{ auth()->user()->name }}.</p>

        <h2>Liste des produits</h2>

        @if ($produits->isEmpty())
            <p>Aucun produit enregistré.</p>
        @else
            <div class="tableau-conteneur">
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prix</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produits as $produit)
                            <tr>
                                <td>{{ $produit->nom }}</td>
                                <td>{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</td>
                                <td class="stock {{ $produit->stock < 50 ? 'stock-bas' : '' }}">
                                    {{ $produit->stock }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection