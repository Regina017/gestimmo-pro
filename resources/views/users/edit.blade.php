@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow border-0">

        <div class="card-header bg-warning">
            Modifier utilisateur
        </div>

        <div class="card-body">

            <form
                action="{{ route('users.update',$user) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Nom
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ $user->name }}"
                            class="form-control"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Identifiant
                        </label>

                        <input
                            type="text"
                            name="identifiant"
                            value="{{ $user->identifiant }}"
                            class="form-control"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ $user->email }}"
                            class="form-control"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Téléphone
                        </label>

                        <input
                            type="text"
                            name="telephone"
                            value="{{ $user->telephone }}"
                            class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Nouveau mot de passe
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Confirmation
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Rôle
                        </label>

                        <select
                            name="role"
                            class="form-select">

                            <option {{ $user->role=='Administrateur' ? 'selected' : '' }}>
                                Administrateur
                            </option>

                            <option {{ $user->role=='Utilisateur' ? 'selected' : '' }}>
                                Utilisateur
                            </option>

                            <option {{ $user->role=='Consultation' ? 'selected' : '' }}>
                                Consultation
                            </option>

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Statut
                        </label>

                        <select
                            name="statut"
                            class="form-select">

                            <option value="Actif"
                                {{ $user->statut=='Actif' ? 'selected' : '' }}>
                                Actif
                            </option>

                            <option value="Bloqué"
                                {{ $user->statut=='Bloqué' ? 'selected' : '' }}>
                                Bloqué
                            </option>

                        </select>

                    </div>

                </div>

                <button class="btn btn-primary">
                    Mettre à jour
                </button>

                <a href="{{ route('users.index') }}"
                   class="btn btn-secondary">
                    Retour
                </a>

            </form>

        </div>

    </div>

</div>

@endsection