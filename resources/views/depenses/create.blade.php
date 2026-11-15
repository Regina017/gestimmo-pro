@extends('layouts.app')

@section('content')

<h1>Nouvelle dépense</h1>

<form method="POST"
      action="{{ route('depenses.store') }}">

    @csrf

    <div class="mb-3">

        <label>Date</label>

        <input
            type="date"
            name="date_depense"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Catégorie</label>

        <input
            type="text"
            name="categorie"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Libellé</label>

        <input
            type="text"
            name="libelle"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Montant</label>

        <input
            type="number"
            step="0.01"
            name="montant"
            class="form-control">

    </div>

    <button
        class="btn btn-primary">

        Enregistrer

    </button>

</form>

@endsection