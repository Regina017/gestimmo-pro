@extends('layouts.pdf')

@section('content')

<h1>Rapport des Paiements</h1>

<table>

    <thead>

        <tr>

            <th>ID</th>
            <th>Date</th>
            <th>Montant</th>
            <th>Mode</th>
            <th>Référence</th>

        </tr>

    </thead>

    <tbody>

    @foreach($paiements as $paiement)

        <tr>

            <td>{{ $paiement->id }}</td>

            <td>
                {{ $paiement->date_paiement }}
            </td>

            <td>
                {{ number_format($paiement->montant,2,',',' ') }} $
            </td>

            <td>
                {{ $paiement->mode_paiement }}
            </td>

            <td>
                {{ $paiement->reference }}
            </td>

        </tr>

    @endforeach

    </tbody>

</table>

@endsection