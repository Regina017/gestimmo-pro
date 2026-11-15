@extends('layouts.app')

@section('content')

<h1>Gestion des paiements</h1>

<a href="{{ route('paiements.create') }}"
   class="btn btn-success mb-3">

    Nouveau paiement

</a>

<table class="table table-bordered">

    <thead>

        <tr>

            <th>Occupation</th>
            <th>Date</th>
            <th>Montant</th>
            <th>Reste</th>
            <th>Actions</th>

        </tr>

    </thead>

    <tbody>

        @forelse($paiements as $paiement)

            <tr>

                <td>{{ $paiement->occupation_id }}</td>

                <td>{{ $paiement->date_paiement }}</td>

                <td>{{ $paiement->montant }}</td>

                <td>{{ $paiement->reste }}</td>

                <td>

                    <a
                        href="{{ route('paiements.edit', $paiement) }}"
                        class="btn btn-primary btn-sm">

                        Modifier

                    </a>

                    <a
                        href="{{ route('paiements.recu', $paiement) }}"
                        class="btn btn-danger btn-sm">

                        📄 Reçu PDF

                    </a>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="5">

                    Aucun paiement enregistré

                </td>

            </tr>

        @endforelse

    </tbody>

</table>

@endsection