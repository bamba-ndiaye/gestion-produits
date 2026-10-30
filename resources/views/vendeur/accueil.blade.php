<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace vendeur</title>
</head>
<body>
    <h1>Bonjour le vendeur !</h1>

    <p>Bienvenue, {{ auth()->user()->name }}.</p>
    <p>Votre rôle : {{ auth()->user()->role }}</p>

    <form action="{{ route('deconnexion') }}" method="POST">
        @csrf
        <button type="submit">Se déconnecter</button>
    </form>
</body>
</html>