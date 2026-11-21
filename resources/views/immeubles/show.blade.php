@extends('layouts.app')

@section('content')

<div class="container">

    <h2>Détails Immeuble</h2>

    <div class="card">

        <div class="card-body">

            <p><strong>Nom :</strong> {{ $immeuble->nom }}</p>

            <p><strong>Adresse :</strong> {{ $immeuble->adresse }}</p>

            <p><strong>Ville :</strong> {{ $immeuble->ville }}</p>

            <p><strong>Description :</strong> {{ $immeuble->description }}</p>

        </div>

    </div>

</div>

@endsection