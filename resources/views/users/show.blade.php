@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow border-0">

        <div class="card-header bg-info text-white">
            Détails utilisateur
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="250">ID</th>
                    <td>{{ $user->id }}</td>
                </tr>

                <tr>
                    <th>Nom</th>
                    <td>{{ $user->name }}</td>
                </tr>

                <tr>
                    <th>Identifiant</th>
                    <td>{{ $user->identifiant }}</td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>

                <tr>
                    <th>Téléphone</th>
                    <td>{{ $user->telephone }}</td>
                </tr>

                <tr>
                    <th>Rôle</th>
                    <td>{{ $user->role }}</td>
                </tr>

                <tr>
                    <th>Statut</th>
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
                </tr>

                <tr>
                    <th>Date de création</th>
                    <td>{{ $user->created_at }}</td>
                </tr>

            </table>

            <div class="mt-3">

                <a href="{{ route('users.index') }}"
                   class="btn btn-secondary">
                    ← Retour
                </a>

                <a href="{{ route('users.edit', $user) }}"
                   class="btn btn-warning">
                    Modifier
                </a>

            </div>

        </div>

    </div>

</div>

@endsection