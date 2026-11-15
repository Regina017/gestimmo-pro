@extends('layouts.app')

@section('content')

<h1>
Nouvelle occupation
</h1>

<form method="POST"
      action="{{ route('occupations.store') }}">

    @csrf

    <div class="mb-3">

        <label>Bien</label>

        <select
            name="bien_id"
            class="form-control">

            @foreach($biens as $bien)

                <option
                    value="{{ $bien->id }}">

                    {{ $bien->reference }}

                </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">

        <label>Locataire</label>

        <select
            name="locataire_id"
            class="form-control">

            @foreach($locataires as $locataire)

                <option
                    value="{{ $locataire->id }}">

                    {{ $locataire->nom }}

                </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">

        <label>Date entrée</label>

        <input
            type="date"
            name="date_entree"
            class="form-control">

    </div>

    <button
        class="btn btn-primary">

        Enregistrer

    </button>

</form>

@endsection