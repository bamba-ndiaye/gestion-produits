<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titre') - Gestion Produits</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @auth
        <header class="navbar">
            <span class="logo">📦 Gestion Produits</span>

            <div class="navbar-droite">
                <span>{{ auth()->user()->name }}</span>
                <span class="badge badge-{{ auth()->user()->role }}">{{ auth()->user()->role }}</span>

                <form action="{{ route('deconnexion') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-secondaire">Se déconnecter</button>
                </form>
            </div>
        </header>
    @endauth

    <main class="conteneur">
        @yield('contenu')
    </main>
</body>
</html>