@extends('layouts.app')

@section('content')

<h1>Gestion des locataires</h1>

<a href="{{ route('locataires.create') }}"
   class="btn btn-success mb-3">

    Ajouter un locataire

</a>

<table class="table table-bordered">

    <thead>

        <tr>

            <th>Nom</th>
            <th>Téléphone</th>
            <th>Email</th>

        </tr>

    </thead>

    <tbody>

        @forelse($locataires as $locataire)

            <tr>

                <td>{{ $locataire->nom }}</td>

                <td>{{ $locataire->telephone }}</td>

                <td>{{ $locataire->email }}</td>

            </tr>

        @empty

            <tr>

                <td colspan="3">

                    Aucun locataire enregistré

                </td>

            </tr>

        @endforelse

    </tbody>

</table>

@endsection