@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">
                📄 Nouveau contrat
            </h4>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            {{-- Vérification URL --}}
            <div class="alert alert-warning">
                URL de soumission :
                {{ route('contrats.store') }}
            </div>

            <div class="alert alert-warning">
    URL de soumission :
    {{ route('contrats.store') }}
</div>
<form action="{{ route('contrats.store') }}"
                  method="POST"
                  autocomplete="off">

                @csrf

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">
                                Locataire
                            </label>

                            <select name="locataire_id"
                                    class="form-select"
                                    required>

                                <option value="">
                                    -- Sélectionner --
                                </option>

                                @foreach($locataires as $locataire)

                                    <option value="{{ $locataire->id }}"
                                        {{ old('locataire_id') == $locataire->id ? 'selected' : '' }}>

                                        {{ $locataire->nom }}
                                        {{ $locataire->prenom }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">
                                Logement
                            </label>

                            <select name="logement_id"
                                    class="form-select"
                                    required>

                                <option value="">
                                    -- Sélectionner --
                                </option>

                                @foreach($logements as $logement)

                                    <option value="{{ $logement->id }}"
                                        {{ old('logement_id') == $logement->id ? 'selected' : '' }}>

                                        {{ $logement->numero }}
                                        - {{ $logement->type }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">
                                Date début
                            </label>

                            <input type="date"
                                   name="date_debut"
                                   class="form-control"
                                   value="{{ old('date_debut') }}"
                                   required>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">
                                Date fin
                            </label>

                            <input type="date"
                                   name="date_fin"
                                   class="form-control"
                                   value="{{ old('date_fin') }}"
                                   required>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <div class="mb-3">

                            <label class="form-label">
                                Loyer
                            </label>

                            <input type="number"
                                   step="0.01"
                                   name="loyer"
                                   class="form-control"
                                   value="{{ old('loyer') }}"
                                   required>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="mb-3">

                            <label class="form-label">
                                Caution
                            </label>

                            <input type="number"
                                   step="0.01"
                                   name="caution"
                                   class="form-control"
                                   value="{{ old('caution', 0) }}"
                                   required>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="mb-3">

                            <label class="form-label">
                                Statut
                            </label>

                            <select name="statut"
                                    class="form-select">

                                <option value="Actif" {{ old('statut', 'Actif') == 'Actif' ? 'selected' : '' }}>
                                    Actif
                                </option>

                                <option value="Terminé" {{ old('statut') == 'Terminé' ? 'selected' : '' }}>
                                    Terminé
                                </option>

                                <option value="Suspendu" {{ old('statut') == 'Suspendu' ? 'selected' : '' }}>
                                    Suspendu
                                </option>

                            </select>

                        </div>

                    </div>

                </div>

                <div class="text-end">

                    <a href="{{ route('contrats.index') }}"
                       class="btn btn-secondary">
                        Retour
                    </a>

                    <button type="submit"
                            class="btn btn-success">

                        💾 Enregistrer

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection