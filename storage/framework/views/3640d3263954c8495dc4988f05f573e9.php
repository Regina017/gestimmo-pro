<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Réinitialisation | Gestimmo‑Pro</title>

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
            max-width:550px;
            border:none;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 20px 40px rgba(0,0,0,.25);
        }

        .header{
            background:#16a34a;
            color:white;
            text-align:center;
            padding:30px;
        }

        .body-card{
            background:white;
            padding:30px;
        }

    </style>

</head>

<body>

<div class="card card-reset">

    <div class="header">

        <h3>

            <i class="fas fa-lock"></i>

            Nouveau mot de passe

        </h3>

    </div>

    <div class="body-card">

        <form method="POST"
              action="<?php echo e(route('password.store')); ?>">

            <?php echo csrf_field(); ?>

            <input
                type="hidden"
                name="token"
                value="<?php echo e($request->route('token')); ?>">

            <div class="mb-3">

                <label>

                    Adresse E‑mail

                </label>

                <input
                    type="email"
                    name="email"
                    value="<?php echo e(old('email', $request->email)); ?>"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label>

                    Nouveau mot de passe

                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label>

                    Confirmation

                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    class="form-control"
                    required>

            </div>

            <button
                type="submit"
                class="btn btn-success w-100">

                <i class="fas fa-check"></i>

                Réinitialiser le mot de passe

            </button>

        </form>

    </div>

</div>

</body>

</html><?php /**PATH C:\laragon\www\gestimmo-pro\resources\views\auth\reset-password.blade.php ENDPATH**/ ?>