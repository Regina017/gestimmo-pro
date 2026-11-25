<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
          <meta name="theme-color" content="#2563eb">

<link rel="manifest"
      href="{{ asset('manifest.json') }}">

<link rel="apple-touch-icon"
      href="{{ asset('icons/icon-192.png') }}">

    <title>{{ config('app.name', 'Gestimmo-Pro') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        body{
            background:#f4f6f9;
            margin:0;
            font-family:"Segoe UI",sans-serif;
        }

        .sidebar{
            position:fixed;
            top:0;
            left:0;
            width:260px;
            height:100vh;
            overflow-y:auto;
            z-index:1000;

            background:linear-gradient(
                180deg,
                #0f172a,
                #1e293b
            );

            color:white;
        }

        .logo{
            text-align:center;
            padding:20px;
            border-bottom:1px solid rgba(255,255,255,.1);
        }

        .logo h4{
            margin-top:10px;
            font-weight:700;
        }

        .sidebar .nav-link{
            color:#cbd5e1;
            padding:13px 20px;
            display:block;
            text-decoration:none;
            transition:.3s;
            border-left:4px solid transparent;
        }

        .sidebar .nav-link:hover{
            background:#2563eb;
            color:white;
            border-left:4px solid white;
        }

        .sidebar .nav-link.active{
            background:#2563eb;
            color:white;
            border-left:4px solid white;
        }

        .sidebar .nav-link i{
            width:25px;
        }

        .content{
            margin-left:260px;
            min-height:100vh;
        }

        .topbar{
            background:white;
            padding:15px 25px;
            box-shadow:0 2px 10px rgba(0,0,0,.08);
        }

        .page-content{
            padding:25px;
        }

        .card{
            border:none;
            border-radius:15px;
            transition:.3s;
        }

        .card:hover{
            transform:translateY(-3px);
            box-shadow:0 10px 20px rgba(0,0,0,.10);
        }

        .user-badge{
            text-align:right;
        }

        .logout-btn{
            border-radius:8px;
        }

        footer{
            background:white;
            text-align:center;
            padding:15px;
            border-top:1px solid #e5e7eb;
        }

        @media(max-width:991px){

            .sidebar{
                position:relative;
                width:100%;
                height:auto;
            }

            .content{
                margin-left:0;
            }

        }

    </style>

</head>

<body>

<div class="sidebar">

@php
    $societe = \App\Models\Societe::first();
@endphp

<div class="logo">

    @if($societe && !empty($societe->logo))

        <img
            src="{{ url('/storage/' . $societe->logo) }}"
            alt="Logo"
            style="
                max-height:70px;
                width:auto;
                display:block;
                margin:0 auto 10px auto;
            ">

    @endif

    <h4>Gestimmo‑Pro</h4>

</div>
    <nav class="mt-3">

        <a href="{{ route('dashboard') }}"
           class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">

            <i class="fas fa-chart-line"></i>
            Tableau de bord

        </a>

        <a href="{{ route('immeubles.index') }}"
           class="nav-link {{ request()->routeIs('immeubles.*') ? 'active' : '' }}">

            <i class="fas fa-building"></i>
            Immeubles

        </a>

        <a href="{{ route('logements.index') }}"
           class="nav-link {{ request()->routeIs('logements.*') ? 'active' : '' }}">

            <i class="fas fa-door-open"></i>
            Logements

        </a>

        <a href="{{ route('locataires.index') }}"
           class="nav-link {{ request()->routeIs('locataires.*') ? 'active' : '' }}">

            <i class="fas fa-users"></i>
            Locataires

        </a>

        <a href="{{ route('contrats.index') }}"
           class="nav-link {{ request()->routeIs('contrats.*') ? 'active' : '' }}">

            <i class="fas fa-file-signature"></i>
            Contrats

        </a>

        <a href="{{ route('paiements.index') }}"
           class="nav-link {{ request()->routeIs('paiements.*') ? 'active' : '' }}">

            <i class="fas fa-money-bill-wave"></i>
            Paiements

        </a>

        <a href="{{ route('depenses.index') }}"
           class="nav-link {{ request()->routeIs('depenses.*') ? 'active' : '' }}">

            <i class="fas fa-receipt"></i>
            Dépenses

        </a>

        <a href="{{ route('rapports.index') }}"
           class="nav-link {{ request()->routeIs('rapports.*') ? 'active' : '' }}">

            <i class="fas fa-chart-pie"></i>
            Rapports

        </a>

        <a href="{{ route('societe.edit') }}"
           class="nav-link {{ request()->routeIs('societe.*') ? 'active' : '' }}">

            <i class="fas fa-gear"></i>
            Paramètres

        </a>

        @auth

            @if(auth()->user()->role === 'Administrateur')

                <a href="{{ route('users.index') }}"
                   class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">

                    <i class="fas fa-users-cog"></i>
                    Utilisateurs

                </a>

            @endif

        @endauth

    </nav>

</div>

<div class="content">

    <div class="topbar">

        <div class="d-flex justify-content-between align-items-center">

            <h5 class="mb-0 fw-bold">
                Gestion Immobilière Professionnelle
            </h5>

            <div class="d-flex align-items-center gap-3">

                <div class="user-badge">

                    <div>

                        <i class="fas fa-user-circle"></i>

                        {{ auth()->user()->name ?? 'Utilisateur' }}

                    </div>

                    <small class="text-muted">

                        {{ auth()->user()->role ?? '' }}

                    </small>

                </div>

                <form action="{{ route('logout') }}"
                      method="POST">

                    @csrf

                    <button type="submit"
                            class="btn btn-danger logout-btn">

                        <i class="fas fa-right-from-bracket"></i>

                        Déconnexion

                    </button>

                </form>

            </div>

        </div>

    </div>

    <div class="page-content">

        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show">

                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"></button>

            </div>

        @endif

        @if(session('error'))

            <div class="alert alert-danger alert-dismissible fade show">

                {{ session('error') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"></button>

            </div>

        @endif

        @if($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        @yield('content')

    </div>

    <footer>

        <small class="text-muted">

            © {{ date('Y') }}

            Gestimmo‑Pro v1.0

        </small>

    </footer>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>

if ('serviceWorker' in navigator) {

    window.addEventListener('load', function () {

        navigator.serviceWorker
            .register('/sw.js')
            .then(function () {

                console.log('Gestimmo-Pro PWA activée');

            })
            .catch(function (error) {

                console.log(error);

            });

    });

}

</script>

</body>

</html>