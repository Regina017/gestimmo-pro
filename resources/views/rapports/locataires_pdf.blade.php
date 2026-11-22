@extends('layouts.pdf')

@section('content')

<h1>Rapport des Locataires</h1>

<table>

    <thead>

        <tr>

            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Téléphone</th>
            <th>Email</th>

        </tr>

    </thead>

    <tbody>

    @foreach($locataires as $locataire)

        <tr>

            <td>{{ $locataire->id }}</td>
            <td>{{ $locataire->nom }}</td>
            <td>{{ $locataire->prenom }}</td>
            <td>{{ $locataire->telephone }}</td>
            <td>{{ $locataire->email }}</td>

        </tr>

    @endforeach

    </tbody>

</table>

@endsection