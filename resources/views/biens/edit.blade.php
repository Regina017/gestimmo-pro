@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Modifier un bien</h1>

    <form method="POST"
          action="{{ route('biens.update', $bien) }}">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Référence</label>
            <input type="text"
                   name="reference"
                   value="{{ $bien->reference }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Type</label>
            <input type="text"
                   name="type"
                   value="{{ $bien->type }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Adresse</label>
            <input type="text"
                   name="adresse"
                   value="{{ $bien->adresse }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Loyer</label>
            <input type="number"
                   name="loyer"
                   value="{{ $bien->loyer }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Caution</label>
            <input type="number"
                   name="caution"
                   value="{{ $bien->caution }}"
                   class="form-control">
        </div>

        <button class="btn btn-primary">
            Mettre à jour
        </button>

    </form>

</div>

@endsection