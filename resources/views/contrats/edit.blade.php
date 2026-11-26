@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-warning">
            Modifier contrat
        </div>

        <div class="card-body">

            <form action="{{ route('contrats.update', $contrat) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">
                        Locataire
                    </label>

                    <select name="locataire_id"
                            class="form-select"
                            required>

                        @foreach($locataires as $locataire)

                            <option value="{{ $locataire->id }}"
                                {{ $contrat->locataire_id == $locataire->id ? 'selected' : '' }}>

                                {{ $locataire->nom }}
                                {{ $locataire->prenom }}

                            </option>

                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Logement
                    </label>

                    <select name="logement_id"
                            class="form-select"
                            required>

                        @foreach($logements as $logement)

                            <option value="{{ $logement->id }}"
                                {{ $contrat->logement_id == $logement->id ? 'selected' : '' }}>

                                {{ $logement->numero }}

                            </option>

                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Date début
                    </label>

                    <input type="date"
                           name="date_debut"
                           value="{{ $contrat->date_debut }}"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Date fin
                    </label>

                    <input type="date"
                           name="date_fin"
                           value="{{ $contrat->date_fin }}"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Loyer
                    </label>

                    <input type="number"
                           step="0.01"
                           name="loyer"
                           value="{{ $contrat->loyer }}"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Caution
                    </label>

                    <input type="number"
                           step="0.01"
                           name="caution"
                           value="{{ $contrat->caution }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Statut
                    </label>

                    <select name="statut"
                            class="form-select">

                        <option value="Actif"
                            {{ $contrat->statut == 'Actif' ? 'selected' : '' }}>
                            Actif
                        </option>

                        <option value="Terminé"
                            {{ $contrat->statut == 'Terminé' ? 'selected' : '' }}>
                            Terminé
                        </option>

                    </select>
                </div>

                <button class="btn btn-primary">
                    Mettre à jour
                </button>

                <a href="{{ route('contrats.index') }}"
                   class="btn btn-secondary">
                    ← Retour
                </a>

            </form>

        </div>

    </div>

</div>

@endsection