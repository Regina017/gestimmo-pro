@extends('layouts.app')

@section('content')

<h1>
Gestion des occupations
</h1>

<a href="{{ route('occupations.create') }}"
   class="btn btn-success mb-3">

    Nouvelle occupation

</a>

<table class="table table-bordered">

    <thead>

        <tr>

            <th>Bien</th>
            <th>Locataire</th>
            <th>Date entrée</th>
            <th>Statut</th>

        </tr>

    </thead>

    <tbody>

        @forelse($occupations as $occupation)

            <tr>

                <td>
                    {{ $occupation->bien->reference }}
                </td>

                <td>
                    {{ $occupation->locataire->nom }}
                </td>

                <td>
                    {{ $occupation->date_entree }}
                </td>

                <td>
                    {{ $occupation->statut }}
                </td>

            </tr>

        @empty

            <tr>

                <td colspan="4">

                    Aucune occupation

                </td>

            </tr>

        @endforelse

    </tbody>

</table>

@endsection