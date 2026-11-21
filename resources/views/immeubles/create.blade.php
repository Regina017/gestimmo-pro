@extends('layouts.app')

@section('content')

<div class="container">

    <h2>Nouvel immeuble</h2>

    <form action="{{ route('immeubles.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label>Propriétaire</label>

            <select
                name="proprietaire_id"
                class="form-control">

                @foreach($proprietaires as $proprietaire)

                    <option value="{{ $proprietaire->id }}">
                        {{ $proprietaire->nom }}
                        {{ $proprietaire->prenom }}
                    </option>

                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label>Nom</label>
            <input type="text"
                   name="nom"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Adresse</label>
            <input type="text"
                   name="adresse"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Ville</label>
            <input type="text"
                   name="ville"
                   class="form-control">
        </div>

        <button class="btn btn-success">
            Enregistrer
        </button>

    </form>

</div>

@endsection