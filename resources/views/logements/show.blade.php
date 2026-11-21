@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header">
            Détails logement
        </div>

        <div class="card-body">

            <p><strong>Numéro :</strong> {{ $logement->numero }}</p>

            <p><strong>Type :</strong> {{ $logement->type }}</p>

            <p><strong>Loyer :</strong> {{ $logement->loyer }}</p>

            <p><strong>Statut :</strong> {{ $logement->statut }}</p>

        </div>

    </div>

</div>

@endsection