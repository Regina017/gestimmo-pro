@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                👤 Nouveau locataire
            </h4>

        </div>

        <div class="card-body">

            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form
                action="{{ route('locataires.store') }}"
                method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Nom
                        </label>

                        <input
                            type="text"
                            name="nom"
                            class="form-control"
                            value="{{ old('nom') }}"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Prénom
                        </label>

                        <input
                            type="text"
                            name="prenom"
                            class="form-control"
                            value="{{ old('prenom') }}"
                            required>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Téléphone
                        </label>

                        <input
                            type="text"
                            name="telephone"
                            class="form-control"
                            value="{{ old('telephone') }}">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email') }}">

                    </div>

                </div>

                <div class="mt-3">

                    <button
                        type="submit"
                        class="btn btn-success">

                        💾 Enregistrer

                    </button>

                    <a
                        href="{{ route('locataires.index') }}"
                        class="btn btn-secondary">

                        Retour

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection