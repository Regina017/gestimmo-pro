@extends('layouts.pdf')

@section('content')

<h1>Rapport des Dépenses</h1>

<table>

    <thead>

        <tr>

            <th>Date</th>
            <th>Catégorie</th>
            <th>Libellé</th>
            <th>Montant</th>

        </tr>

    </thead>

    <tbody>

    @foreach($depenses as $depense)

        <tr>

            <td>{{ $depense->date_depense }}</td>

            <td>{{ $depense->categorie }}</td>

            <td>{{ $depense->libelle }}</td>

            <td>
                {{ number_format($depense->montant,2,',',' ') }} $
            </td>

        </tr>

    @endforeach

    </tbody>

</table>

@endsection