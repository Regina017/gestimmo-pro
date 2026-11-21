<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>403 - Accès refusé | Gestimmo‑Pro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        body{
            margin:0;
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:linear-gradient(
                135deg,
                #0f172a,
                #1e3a8a,
                #2563eb
            );
            font-family:"Segoe UI",sans-serif;
        }

        .error-card{
            width:95%;
            max-width:750px;
            background:white;
            border-radius:20px;
            padding:50px;
            text-align:center;
            box-shadow:0 20px 50px rgba(0,0,0,.25);
        }

        .error-code{
            font-size:120px;
            font-weight:900;
            color:#f59e0b;
            line-height:1;
        }

        .error-icon{
            font-size:70px;
            color:#f59e0b;
            margin-bottom:20px;
        }

        .logo{
            max-height:90px;
            margin-bottom:20px;
        }

    </style>

</head>

<body>

<div class="error-card">

    @if(file_exists(public_path('images/logo.png')))
        <img src="{{ asset('images/logo.png') }}"
             class="logo"
             alt="Logo">
    @endif

    <div class="error-icon">
        <i class="fas fa-lock"></i>
    </div>

    <div class="error-code">
        403
    </div>

    <h2 class="fw-bold mb-3">
        Accès refusé
    </h2>

    <p class="text-muted mb-4">
        Vous n'avez pas les permissions nécessaires
        pour accéder à cette page.
    </p>

    <a href="{{ route('dashboard') }}"
       class="btn btn-primary">

        <i class="fas fa-chart-line"></i>
        Tableau de bord

    </a>

</div>

</body>
</html>