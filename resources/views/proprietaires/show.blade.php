@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header">

            🏢 Détails du propriétaire

        </div>

        <div class="card-body">

            <p>

                <strong>Nom :</strong>

                {{ $proprietaire->nom }}

                {{ $proprietaire->prenom }}

            </p>

            <p>

                <strong>Téléphone :</strong>

                {{ $proprietaire->telephone }}

            </p>

            <p>

                <strong>Email :</strong>

                {{ $proprietaire->email }}

            </p>

            <a href="{{ route('proprietaires.index') }}"
               class="btn btn-primary">

                Retour

            </a>

        </div>

    </div>

</div>

@endsection