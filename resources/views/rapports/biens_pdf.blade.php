@extends('layouts.pdf')

@section('content')

<h1>Rapport des Biens</h1>

<table>

    <thead>

        <tr>

            <th>Référence</th>
            <th>Type</th>
            <th>Adresse</th>
            <th>Loyer</th>
            <th>Caution</th>
            <th>Statut</th>

        </tr>

    </thead>

    <tbody>

    @foreach($biens as $bien)

        <tr>

            <td>{{ $bien->reference }}</td>
            <td>{{ $bien->type }}</td>
            <td>{{ $bien->adresse }}</td>

            <td>
                {{ number_format($bien->loyer,2,',',' ') }} $
            </td>

            <td>
                {{ number_format($bien->caution,2,',',' ') }} $
            </td>

            <td>{{ $bien->statut }}</td>

        </tr>

    @endforeach

    </tbody>

</table>

@endsection