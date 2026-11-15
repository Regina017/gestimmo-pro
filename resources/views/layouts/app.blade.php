<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <title>GESTIMMO PRO</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body>

<div class="container mt-4">

    <nav class="mb-4">

        <a href="/dashboard" class="btn btn-primary btn-sm">
            Dashboard
        </a>

        <a href="/biens" class="btn btn-secondary btn-sm">
            Biens
        </a>

        <a href="/locataires" class="btn btn-secondary btn-sm">
            Locataires
        </a>

        <a href="/occupations" class="btn btn-secondary btn-sm">
            Occupations
        </a>

        <a href="/paiements" class="btn btn-secondary btn-sm">
            Paiements
        </a>

        <a href="/depenses" class="btn btn-secondary btn-sm">
            Dépenses
        </a>

        <a href="/caisse" class="btn btn-success btn-sm">
            Caisse
        </a>

        <a href="/rapports" class="btn btn-warning btn-sm">
            Rapports
        </a>

        <a href="/echeancier" class="btn btn-info btn-sm">
            📅 Échéancier
        </a>

        <a href="/recherche" class="btn btn-primary btn-sm">
            🔎 Recherche
        </a>

        @auth

            @if(auth()->user()->role === 'Administrateur')

                <a
                    href="/users"
                    class="btn btn-dark btn-sm">

                    Utilisateurs

                </a>

                <a
                    href="/journaux"
                    class="btn btn-info btn-sm">

                    Journal

                </a>

            @endif

            @if(auth()->user()->role === 'Gestionnaire')

                <a
                    href="/journaux"
                    class="btn btn-info btn-sm">

                    Journal

                </a>

            @endif

        @endauth

        <form
            method="POST"
            action="{{ route('logout') }}"
            class="d-inline"
        >

            @csrf

            <button
                type="submit"
                class="btn btn-danger btn-sm"
            >

                Déconnexion

            </button>

        </form>

    </nav>

    @yield('content')

</div>

</body>

</html>