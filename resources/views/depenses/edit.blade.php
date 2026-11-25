@extends('layouts.app')

@section('content')

<h1>Modifier une dépense</h1>

<form method="POST"
      action="{{ route('depenses.update',$depense) }}">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Date</label>
        <input type="date"
               name="date_depense"
               class="form-control"
               value="{{ $depense->date_depense }}">
    </div>

    <div class="mb-3">
        <label>Catégorie</label>
        <input type="text"
               name="categorie"
               class="form-control"
               value="{{ $depense->categorie }}">
    </div>

    <div class="mb-3">
        <label>Libellé</label>
        <input type="text"
               name="libelle"
               class="form-control"
               value="{{ $depense->libelle }}">
    </div>

    <div class="mb-3">
        <label>Montant</label>
        <input type="number"
               step="0.01"
               name="montant"
               class="form-control"
               value="{{ $depense->montant }}">
    </div>

    <button class="btn btn-primary">
        Mettre à jour
    </button>

    <a href="{{ route('depenses.index') }}"
       class="btn btn-secondary">
        Retour
    </a>

</form>

@endsection