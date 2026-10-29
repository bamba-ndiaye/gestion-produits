<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h1>Créer un compte</h1>

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('inscription.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="email">Adresse e-mail :</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <label for="password_confirmation">Confirmer le mot de passe :</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit">S'inscrire</button>
    </form>

    <p>
        Vous avez déjà un compte ?
        <a href="{{ route('connexion') }}">Se connecter</a>
    </p>
</body>
</html>