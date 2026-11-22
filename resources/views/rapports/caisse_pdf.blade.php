@extends('layouts.pdf')

@section('content')

<h1>Rapport de Caisse</h1>

<table>

    <tr>

        <th>Total Paiements</th>

        <td>
            {{ number_format($totalPaiements,2,',',' ') }} $
        </td>

    </tr>

    <tr>

        <th>Total Dépenses</th>

        <td>
            {{ number_format($totalDepenses,2,',',' ') }} $
        </td>

    </tr>

    <tr>

        <th>Solde</th>

        <td>

            <strong>

                {{ number_format($solde,2,',',' ') }} $

            </strong>

        </td>

    </tr>

</table>

@endsection