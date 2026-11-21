@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">
            Nouvel utilisateur
        </div>

        <div class="card-body">

            <form action="{{ route('users.store') }}"
                  method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Nom
                        </label>

                        <input
                            type="text"
                            name="name"
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
                            class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Mot de passe
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Confirmation
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Rôle
                        </label>

                        <select
                            name="role"
                            class="form-select"
                            required>

                            <option value="Administrateur">
                                Administrateur
                            </option>

                            <option value="Utilisateur">
                                Utilisateur
                            </option>

                            <option value="Consultation">
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

                            <option value="Actif">
                                Actif
                            </option>

                            <option value="Bloqué">
                                Bloqué
                            </option>

                        </select>

                    </div>

                </div>

                <button class="btn btn-success">
                    Enregistrer
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