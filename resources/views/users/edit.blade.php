@extends('layouts.app')

@section('content')

<h1>Modifier utilisateur</h1>

<form method="POST"
      action="{{ route('users.update', $user->id) }}">

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label>Nom</label>

        <input
            type="text"
            name="name"
            class="form-control"
            value="{{ $user->name }}">

    </div>

    <div class="mb-3">

        <label>Identifiant</label>

        <input
            type="text"
            name="identifiant"
            class="form-control"
            value="{{ $user->identifiant }}">

    </div>

    <div class="mb-3">

        <label>Téléphone</label>

        <input
            type="text"
            name="telephone"
            class="form-control"
            value="{{ $user->telephone }}">

    </div>

    <div class="mb-3">

        <label>Email</label>

        <input
            type="email"
            name="email"
            class="form-control"
            value="{{ $user->email }}">

    </div>

    <div class="mb-3">

        <label>Rôle</label>

        <select
            name="role"
            class="form-control">

            <option
                {{ $user->role == 'Administrateur' ? 'selected' : '' }}>
                Administrateur
            </option>

            <option
                {{ $user->role == 'Gestionnaire' ? 'selected' : '' }}>
                Gestionnaire
            </option>

            <option
                {{ $user->role == 'Consultation' ? 'selected' : '' }}>
                Consultation
            </option>

        </select>

    </div>

    <button
        class="btn btn-success">

        Enregistrer

    </button>

</form>

@endsection