<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produits</title>
</head>
<body>
    <h1>Espace administrateur</h1>

    <p>Bonjour, {{ auth()->user()->name }}.</p>

    <h2>Liste des produits</h2>

    @if ($produits->isEmpty())
        <p>Aucun produit enregistré.</p>
    @else
        <table border="1" cellpadding="10">
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
                        <td>{{ $produit->prix }}</td>
                        <td>{{ $produit->stock }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <form action="{{ route('deconnexion') }}" method="POST">
        @csrf
        <button type="submit">Se déconnecter</button>
    </form>
</body>
</html>