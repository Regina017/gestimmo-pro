@extends('layouts.app')

@section('content')

<h1 class="mb-4">

    🔎 Recherche globale

</h1>

<form
    action="{{ route('recherche.index') }}"
    method="GET"
>

    <div class="input-group mb-4">

        <input
            type="text"
            name="mot"
            class="form-control"
            placeholder="Nom, référence, adresse, téléphone..."
            value="{{ $mot }}"
        >

        <button
            type="submit"
            class="btn btn-primary"
        >

            Rechercher

        </button>

    </div>

</form>

@if($mot)

    <div class="card mb-4">

        <div class="card-header">

            🏠 Biens

        </div>

        <div class="card-body">

            @forelse($biens as $bien)

                <div>

                    {{ $bien->reference }}
                    -
                    {{ $bien->adresse }}

                </div>

            @empty

                <div>

                    Aucun bien trouvé

                </div>

            @endforelse

        </div>

    </div>

    <div class="card mb-4">

        <div class="card-header">

            👤 Locataires

        </div>

        <div class="card-body">

            @forelse($locataires as $locataire)

                <div>

                    {{ $locataire->prenom }}
                    {{ $locataire->nom }}

                    -

                    {{ $locataire->telephone }}

                </div>

            @empty

                <div>

                    Aucun locataire trouvé

                </div>

            @endforelse

        </div>

    </div>

    <div class="card mb-4">

        <div class="card-header">

            💰 Paiements

        </div>

        <div class="card-body">

            @forelse($paiements as $paiement)

                <div>

                    {{ $paiement->date_paiement }}
                    -

                    {{ number_format($paiement->montant, 2) }} $

                </div>

            @empty

                <div>

                    Aucun paiement trouvé

                </div>

            @endforelse

        </div>

    </div>

    <div class="card mb-4">

        <div class="card-header">

            💸 Dépenses

        </div>

        <div class="card-body">

            @forelse($depenses as $depense)

                <div>

                    {{ $depense->libelle }}

                    -

                    {{ number_format($depense->montant, 2) }} $

                </div>

            @empty

                <div>

                    Aucune dépense trouvée

                </div>

            @endforelse

        </div>

    </div>

@endif

@endsection