@extends('layouts.pdf')

@section('content')

<h1>Rapport des Contrats</h1>

<table>

    <thead>

        <tr>
            <th>ID</th>
            <th>Locataire</th>
            <th>Logement</th>
            <th>Date début</th>
            <th>Date fin</th>
            <th>Loyer</th>
            <th>Statut</th>
        </tr>

    </thead>

    <tbody>

        @forelse($contrats as $contrat)

            <tr>

                <td>{{ $contrat->id }}</td>

                <td>
                    {{ $contrat->locataire->nom ?? '' }}
                    {{ $contrat->locataire->prenom ?? '' }}
                </td>

                <td>
                    {{ $contrat->logement->numero ?? '' }}
                </td>

                <td>
                    {{ \Carbon\Carbon::parse($contrat->date_debut)->format('d/m/Y') }}
                </td>

                <td>
                    {{ \Carbon\Carbon::parse($contrat->date_fin)->format('d/m/Y') }}
                </td>

                <td>
                    {{ number_format($contrat->loyer, 2, ',', ' ') }} $
                </td>

                <td>
                    {{ $contrat->statut }}
                </td>

            </tr>

        @empty

            <tr>
                <td colspan="7" style="text-align:center;">
                    Aucun contrat trouvé
                </td>
            </tr>

        @endforelse

    </tbody>

</table>

@endsection