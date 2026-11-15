@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Ajouter un locataire</h1>

    <form method="POST"
          action="{{ route('locataires.store') }}">

        @csrf

        <div class="mb-3">

            <label>Nom</label>

            <input type="text"
                   name="nom"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Téléphone</label>

            <input type="text"
                   name="telephone"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Email</label>

            <input type="email"
                   name="email"
                   class="form-control">

        </div>

        <button class="btn btn-primary">

            Enregistrer

        </button>

    </form>

</div>

@endsection