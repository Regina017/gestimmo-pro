@extends('layouts.app')

@section('content')

<div class="container">

    <h2>Modifier contrat</h2>

    <form action="{{ route('contrats.update',$contrat) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Loyer</label>

            <input
                type="number"
                step="0.01"
                name="loyer"
                value="{{ $contrat->loyer }}"
                class="form-control">

        </div>

        <button class="btn btn-primary">
            Mettre à jour
        </button>

    </form>

</div>

@endsection