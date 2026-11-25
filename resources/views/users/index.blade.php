@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold">
            Gestion des utilisateurs
        </h2>

        <a href="{{ route('users.create') }}"
           class="btn btn-primary">
            + Nouvel utilisateur
        </a>

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card shadow border-0">

        <div class="card-body table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-dark">

                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Identifiant</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Rôle</th>
                    <th>Statut</th>
                    <th width="280">Actions</th>
                </tr>

                </thead>

                <tbody>

                @forelse($users as $user)

 <tr>

    <td>{{ $user->id }}</td>

    <td>{{ $user->name }}</td>

    <td>{{ $user->identifiant }}</td>

    <td>{{ $user->email }}</td>

    <td>{{ $user->telephone }}</td>

    <td>

        @if($user->role == 'Administrateur')

            <span class="badge bg-danger">
                Administrateur
            </span>

        @elseif($user->role == 'Utilisateur')

            <span class="badge bg-primary">
                Utilisateur
            </span>

        @else

            <span class="badge bg-secondary">
                Consultation
            </span>

        @endif

    </td>

    <td>

        @if($user->statut == 'Actif')

            <span class="badge bg-success">
                Actif
            </span>

        @else

            <span class="badge bg-danger">
                Bloqué
            </span>

        @endif

    </td>

    <td>

        <a href="{{ route('users.show', $user) }}"
           class="btn btn-info btn-sm">
            Voir
        </a>

        <a href="{{ route('users.edit',$user) }}"
           class="btn btn-warning btn-sm">
            Modifier
        </a>

        @if($user->statut == 'Actif')

            <form
                action="{{ route('users.bloquer',$user) }}"
                method="POST"
                class="d-inline">

                @csrf
                @method('PUT')

                <button class="btn btn-secondary btn-sm">
                    Bloquer
                </button>

            </form>

        @else

            <form
                action="{{ route('users.debloquer',$user) }}"
                method="POST"
                class="d-inline">

                @csrf
                @method('PUT')

                <button class="btn btn-success btn-sm">
                    Débloquer
                </button>

            </form>

        @endif

        <form
            action="{{ route('users.destroy',$user) }}"
            method="POST"
            class="d-inline">

            @csrf
            @method('DELETE')

            <button
                onclick="return confirm('Supprimer cet utilisateur ?')"
                class="btn btn-danger btn-sm">

                Supprimer

            </button>

        </form>

    </td>

</tr>
                        <td colspan="8" class="text-center">
                            Aucun utilisateur trouvé.
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

            {{ $users->links() }}

        </div>

    </div>

</div>

@endsection