@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                💰 Nouveau paiement
            </h4>

        </div>

        <div class="card-body">

            <form
                action="{{ route('paiements.store') }}"
                method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Contrat
                    </label>

                    <select
                        name="contrat_id"
                        class="form-control"
                        required>

                        <option value="">
                            Sélectionner
                        </option>

                        @foreach($contrats as $contrat)

                            <option
                                value="{{ $contrat->id }}">

                                Contrat #{{ $contrat->id }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Date paiement
                    </label>

                    <input
                        type="date"
                        name="date_paiement"
                        class="form-control"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Montant
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="montant"
                        class="form-control"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Mode de paiement
                    </label>

                    <select
                        name="mode_paiement"
                        class="form-control"
                        required>

                        <option value="Espèces">
                            Espèces
                        </option>

                        <option value="Virement">
                            Virement
                        </option>

                        <option value="Chèque">
                            Chèque
                        </option>

                        <option value="Carte bancaire">
                            Carte bancaire
                        </option>

                    </select>

                </div>

                <button
                    type="submit"
                    class="btn btn-success">

                    Enregistrer

                </button>

                <a
                    href="{{ route('paiements.index') }}"
                    class="btn btn-secondary">

                    Annuler

                </a>

            </form>

        </div>

    </div>

</div>

@endsection