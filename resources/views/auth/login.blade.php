<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Connexion | Gestimmo‑Pro</title>

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
            padding:20px;
            background:linear-gradient(
                135deg,
                #0f172a,
                #1e3a8a,
                #2563eb
            );
            font-family:"Segoe UI",sans-serif;
        }

        .login-card{
            width:100%;
            max-width:500px;
            background:rgba(255,255,255,.98);
            border:none;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 20px 45px rgba(0,0,0,.25);
        }

        .login-header{
            text-align:center;
            padding:35px;
            background:linear-gradient(
                135deg,
                #2563eb,
                #1d4ed8
            );
            color:white;
        }

        .login-header img{
            max-height:90px;
            margin-bottom:15px;
        }

        .login-body{
            padding:35px;
        }

        .form-control{
            border-radius:12px;
            padding:12px;
        }

        .form-control:focus{
            border-color:#2563eb;
            box-shadow:0 0 0 .2rem rgba(37,99,235,.15);
        }

        .btn-login{
            border-radius:12px;
            padding:12px;
            font-weight:600;
            transition:.3s;
        }

        .btn-login:hover{
            transform:translateY(-2px);
            box-shadow:0 10px 20px rgba(37,99,235,.25);
        }

        .forgot-link{
            font-size:14px;
            font-weight:600;
            text-decoration:none;
            color:#6c757d;
        }

        .footer-text{
            text-align:center;
            margin-top:25px;
            color:#6b7280;
            font-size:14px;
        }

    </style>

</head>

<body>

<div class="login-card">

    <div class="login-header">

        @if(file_exists(public_path('images/logo.png')))

            <img
                src="{{ asset('images/logo.png') }}"
                alt="Logo">

        @endif

        <h3 class="fw-bold mb-1">

            Gestimmo‑Pro

        </h3>

        <small>

            Gestion Immobilière Professionnelle

        </small>

    </div>

    <div class="login-body">

        @if(session('status'))

            <div class="alert alert-success">

                {{ session('status') }}

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

        <form method="POST"
              action="{{ route('login') }}">

            @csrf

            <div class="mb-3">

                <label class="form-label">

                    <i class="fas fa-user"></i>

                    Identifiant

                </label>

                <input
                    id="identifiant"
                    type="text"
                    name="identifiant"
                    value="{{ old('identifiant') }}"
                    class="form-control"
                    required
                    autofocus>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    <i class="fas fa-lock"></i>

                    Mot de passe

                </label>

                <div class="input-group">

                    <input
                        id="password"
                        type="password"
                        name="password"
                        class="form-control"
                        required>

                    <button
                        type="button"
                        class="btn btn-outline-secondary"
                        onclick="togglePassword()">

                        <i class="fas fa-eye"></i>

                    </button>

                </div>

            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">

                <div class="form-check">

                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="remember"
                        id="remember">

                    <label
                        class="form-check-label"
                        for="remember">

                        Se souvenir de moi

                    </label>

                </div>

      <a href="{{ route('password.request') }}"
   class="forgot-link">

    <i class="fas fa-key"></i>

    Mot de passe oublié ?

</a>

            </div>

            <button
                type="submit"
                class="btn btn-primary w-100 btn-login">

                <i class="fas fa-right-to-bracket"></i>

                Se connecter

            </button>

        </form>

        <div class="footer-text">

            © {{ date('Y') }}

            <strong>Gestimmo‑Pro</strong>

            <br>

            Gestion Immobilière Professionnelle

        </div>

    </div>

</div>

<script>

function togglePassword()
{
    let password = document.getElementById('password');

    if(password.type === 'password')
    {
        password.type = 'text';
    }
    else
    {
        password.type = 'password';
    }
}

</script>

</body>

</html>