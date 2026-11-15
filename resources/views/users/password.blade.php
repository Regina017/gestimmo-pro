@extends('layouts.app')

@section('content')

<h1>Réinitialiser le mot de passe</h1>

<form method="POST"
      action="{{ route('users.password.update', $user->id) }}">

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label>Nouveau mot de passe</label>

        <input
            type="password"
            name="password"
            class="form-control"
            minlength="8"
            required>

    </div>

    <button
        type="submit"
        class="btn btn-primary">

        Enregistrer

    </button>

</form>

@endsection