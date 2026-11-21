@extends('layouts.app')

@section('content')

<div class="container">

    <h2>Modifier immeuble</h2>

    <form action="{{ route('immeubles.update',$immeuble) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nom</label>
            <input type="text"
                   name="nom"
                   value="{{ $immeuble->nom }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Adresse</label>
            <input type="text"
                   name="adresse"
                   value="{{ $immeuble->adresse }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Ville</label>
            <input type="text"
                   name="ville"
                   value="{{ $immeuble->ville }}"
                   class="form-control">
        </div>

        <button class="btn btn-primary">
            Mettre à jour
        </button>

    </form>

</div>

@endsection