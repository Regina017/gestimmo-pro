@extends('layouts.app')

@section('content')

<h1>Gestion des utilisateurs</h1>

<a href="{{ route('users.create') }}"
   class="btn btn-success mb-3">
    Nouvel utilisateur
</a>

<table class="table table-bordered">

    <thead>
        <tr>
            <th>Nom</th>
            <th>Identifiant</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Rôle</th>
            <th>Statut</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>

    @foreach($users as $user)

        <tr>

            <td>{{ $user->name }}</td>
            <td>{{ $user->identifiant }}</td>
            <td>{{ $user->telephone }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>{{ $user->statut }}</td>

            <td>

                <a href="{{ route('users.edit', $user->id) }}"
                   class="btn btn-primary btn-sm">
                    Modifier
                </a>

                <a href="{{ route('users.password.edit', $user->id) }}"
                   class="btn btn-secondary btn-sm">
                    Mot de passe
                </a>

                @if($user->statut == 'Actif')

                    <a href="{{ route('users.block', $user->id) }}"
                       class="btn btn-warning btn-sm">
                        Bloquer
                    </a>

                @else

                    <a href="{{ route('users.unblock', $user->id) }}"
                       class="btn btn-success btn-sm">
                        Débloquer
                    </a>

                @endif

                <form action="{{ route('users.destroy', $user->id) }}"
                      method="POST"
                      class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Supprimer cet utilisateur ?')">

                        Supprimer

                    </button>

                </form>

            </td>

        </tr>

    @endforeach

    </tbody>

</table>

@endsection

               