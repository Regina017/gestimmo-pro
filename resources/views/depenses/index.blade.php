@extends('layouts.app')

@section('content')

<h1>Gestion des dépenses</h1>

<a href="{{ route('depenses.create') }}"
   class="btn btn-success mb-3">

    Nouvelle dépense

</a>

<table class="table table-bordered">

    <thead>

        <tr>

            <th>Date</th>
            <th>Catégorie</th>
            <th>Libellé</th>
            <th>Montant</th>

        </tr>

    </thead>

    <tbody>

        @forelse($depenses as $depense)

            <tr>

                <td>{{ $depense->date_depense }}</td>

                <td>{{ $depense->categorie }}</td>

                <td>{{ $depense->libelle }}</td>

                <td>{{ $depense->montant }}</td>

            </tr>

        @empty

            <tr>

                <td colspan="4">

                    Aucune dépense enregistrée

                </td>

            </tr>

        @endforelse

    </tbody>

</table>

@endsection