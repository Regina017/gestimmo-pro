@extends('layouts.app')

@section('content')

<h1>Nouveau paiement</h1>

<form method="POST"
      action="{{ route('paiements.store') }}">

    @csrf

    <div class="mb-3">

        <label>Occupation</label>

        <select
            name="occupation_id"
            class="form-control">

            @foreach($occupations as $occupation)

                <option value="{{ $occupation->id }}">

                    {{ $occupation->bien->reference }}
                    -
                    {{ $occupation->locataire->nom }}

                </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">

        <label>Date paiement</label>

        <input type="date"
               name="date_paiement"
               class="form-control">

    </div>

    <div class="mb-3">

        <label>Montant</label>

        <input type="number"
               name="montant"
               class="form-control">

    </div>

    <div class="mb-3">

        <label>Reste</label>

        <input type="number"
               name="reste"
               class="form-control">

    </div>

    <button class="btn btn-primary">

        Enregistrer

    </button>

</form>

@endsection