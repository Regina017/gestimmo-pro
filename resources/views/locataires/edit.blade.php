@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-warning">

            <h4 class="mb-0">
                Modifier le locataire
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

            <form action="{{ route('locataires.update', $locataire) }}"
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
                            name="nom"
                            class="form-control"
                            value="{{ old('nom', $locataire->nom) }}"
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
                            value="{{ old('prenom', $locataire->prenom) }}"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Téléphone
                        </label>

                        <input
                            type="text"
                            name="telephone"
                            class="form-control"
                            value="{{ old('telephone', $locataire->telephone) }}">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email', $locataire->email) }}">

                    </div>

                </div>

                <button
                    type="submit"
                    class="btn btn-success">

                    💾 Enregistrer

                </button>

                <a href="{{ route('locataires.index') }}"
                   class="btn btn-secondary">

                    Retour

                </a>

            </form>

        </div>

    </div>

</div>

@endsection