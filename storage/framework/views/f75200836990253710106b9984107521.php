<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>500 - Erreur Serveur | Gestimmo‑Pro</title>

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

            color:#dc3545;

            line-height:1;

        }

        .error-icon{

            font-size:70px;

            color:#dc3545;

            margin-bottom:20px;

        }

        .error-title{

            font-size:32px;

            font-weight:700;

            color:#1e293b;

            margin-bottom:15px;

        }

        .error-description{

            color:#6c757d;

            font-size:18px;

            margin-bottom:35px;

        }

        .btn-custom{

            border-radius:12px;

            padding:12px 25px;

            font-weight:600;

        }

        .logo{

            max-height:90px;

            margin-bottom:25px;

        }

    </style>

</head>

<body>

<div class="error-card">

    <?php if(file_exists(public_path('images/logo.png'))): ?>
        <img
            src="<?php echo e(asset('images/logo.png')); ?>"
            alt="Logo"
            class="logo">
    <?php endif; ?>

    <div class="error-icon">
        <i class="fas fa-triangle-exclamation"></i>
    </div>

    <div class="error-code">
        500
    </div>

    <h1 class="error-title">
        Erreur interne du serveur
    </h1>

    <p class="error-description">

        Une erreur inattendue s'est produite dans
        l'application.

        <br><br>

        Veuillez réessayer dans quelques instants
        ou contacter l'administrateur système.

    </p>

    <div class="d-flex justify-content-center gap-3 flex-wrap">

        <a href="<?php echo e(route('dashboard')); ?>"
           class="btn btn-primary btn-custom">

            <i class="fas fa-chart-line"></i>

            Tableau de bord

        </a>

        <button onclick="history.back()"
                class="btn btn-secondary btn-custom">

            <i class="fas fa-arrow-left"></i>

            Retour

        </button>

    </div>

    <hr class="my-4">

    <small class="text-muted">

        © <?php echo e(date('Y')); ?>


        Gestimmo‑Pro v1.1

    </small>

</div>

</body>

</html><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\errors\500.blade.php ENDPATH**/ ?>