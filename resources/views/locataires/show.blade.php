@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header">
            Détails du locataire
        </div>

        <div class="card-body">

            <p>
                <strong>Nom :</strong>
                {{ $locataire->nom }}
            </p>

            <p>
                <strong>Prénom :</strong>
                {{ $locataire->prenom }}
            </p>

            <p>
                <strong>Téléphone :</strong>
                {{ $locataire->telephone }}
            </p>

            <p>
                <strong>Email :</strong>
                {{ $locataire->email }}
            </p>

            <a href="{{ route('locataires.index') }}"
               class="btn btn-secondary">

                Retour

            </a>

        </div>

    </div>

</div>

@endsection