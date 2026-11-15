@extends('layouts.app')

@section('content')

<h1>Nouvel utilisateur</h1>

<form method="POST"
      action="{{ route('users.store') }}">

    @csrf

    <div class="mb-3">

        <label>Nom complet</label>

        <input
            type="text"
            name="name"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Identifiant</label>

        <input
            type="text"
            name="identifiant"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Téléphone</label>

        <input
            type="text"
            name="telephone"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Email</label>

        <input
            type="email"
            name="email"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Mot de passe</label>

        <input
            type="password"
            name="password"
            minlength="8"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Rôle</label>

        <select
            name="role"
            class="form-control">

            <option>
                Administrateur
            </option>

            <option>
                Gestionnaire
            </option>

            <option>
                Consultation
            </option>

        </select>

    </div>

    <button
        class="btn btn-primary">

        Enregistrer

    </button>

</form>

@endsection