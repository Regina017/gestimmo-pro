<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Mot de passe oublié | Gestimmo‑Pro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        body{
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

        .card-reset{
            width:100%;
            max-width:500px;
            border:none;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 20px 40px rgba(0,0,0,.25);
        }

        .header{
            background:#2563eb;
            color:white;
            text-align:center;
            padding:30px;
        }

        .body-card{
            padding:30px;
            background:white;
        }

    </style>

</head>

<body>

<div class="card card-reset">

    <div class="header">

        <h3>
            <i class="fas fa-key"></i>
            Mot de passe oublié
        </h3>

        <small>
            Gestimmo‑Pro
        </small>

    </div>

    <div class="body-card">

        <?php if(session('status')): ?>

            <div class="alert alert-success">

                <?php echo e(session('status')); ?>


            </div>

        <?php endif; ?>

        <p class="text-muted">

            Entrez votre adresse e‑mail.
            Un lien de réinitialisation sera envoyé.

        </p>

        <form method="POST"
              action="<?php echo e(route('password.email')); ?>">

            <?php echo csrf_field(); ?>

            <div class="mb-3">

                <label class="form-label">

                    Adresse E‑mail

                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    required>

            </div>

            <button
                type="submit"
                class="btn btn-primary w-100">

                <i class="fas fa-paper-plane"></i>

                Envoyer le lien

            </button>

        </form>

        <div class="text-center mt-3">

            <a href="<?php echo e(route('login')); ?>">

                Retour connexion

            </a>

        </div>

    </div>

</div>

</body>

</html><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\auth\forgot-password.blade.php ENDPATH**/ ?>