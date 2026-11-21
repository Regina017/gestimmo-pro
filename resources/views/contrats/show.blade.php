@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header">

            Détails du contrat

        </div>

        <div class="card-body">

            <p>
                <strong>Locataire :</strong>

                {{ $contrat->locataire->nom ?? '' }}
                {{ $contrat->locataire->prenom ?? '' }}
            </p>

            <p>
                <strong>Logement :</strong>

                {{ $contrat->logement->numero ?? '' }}
            </p>

            <p>
                <strong>Date début :</strong>

                {{ $contrat->date_debut }}
            </p>

            <p>
                <strong>Date fin :</strong>

                {{ $contrat->date_fin }}
            </p>

            <p>
                <strong>Loyer :</strong>

                {{ number_format($contrat->loyer,2) }} $
            </p>

            <p>
                <strong>Caution :</strong>

                {{ number_format($contrat->caution,2) }} $
            </p>

            <p>
                <strong>Statut :</strong>

                {{ $contrat->statut }}
            </p>

            <hr>

            <a
                href="{{ route('contrats.pdf',$contrat) }}"
                class="btn btn-danger">

                📄 Télécharger le PDF

            </a>

            <a
                href="{{ route('contrats.index') }}"
                class="btn btn-secondary">

                Retour

            </a>

        </div>

    </div>

</div>

@endsection