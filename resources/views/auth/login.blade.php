<x-guest-layout>

    <form method="POST" action="{{ route('login') }}">

        @csrf

        <div class="mt-4">

            <label for="identifiant">

                Identifiant

            </label>

            <input
                id="identifiant"
                type="text"
                name="identifiant"
                class="form-control"
                required
                autofocus>

        </div>

        <div class="mt-4">

            <label for="password">

                Mot de passe

            </label>

            <input
                id="password"
                type="password"
                name="password"
                minlength="8"
                class="form-control"
                required>

            <button
                type="button"
                class="btn btn-secondary btn-sm mt-2"
                onclick="togglePassword()">

                Afficher / Masquer

            </button>

        </div>

        <div class="mt-4">

            <button
                type="submit"
                class="btn btn-primary">

                Se connecter

            </button>

        </div>

    </form>

    <script>

        function togglePassword()
        {
            let password =
                document.getElementById('password');

            if (password.type === 'password') {

                password.type = 'text';

            } else {

                password.type = 'password';

            }
        }

    </script>

</x-guest-layout>