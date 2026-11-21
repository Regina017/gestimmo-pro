@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-warning">

            <h4 class="mb-0">
                ✏ Modifier le paiement
            </h4>

        </div>

        <div class="card-body">

            <form
                action="{{ route('paiements.update',$paiement) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Contrat
                    </label>

                    <select
                        name="contrat_id"
                        class="form-control">

                        @foreach($contrats as $contrat)

                            <option
                                value="{{ $contrat->id }}"
                                @selected(
                                    $paiement->contrat_id == $contrat->id
                                )>

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
                        value="{{ $paiement->date_paiement }}"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Montant
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="montant"
                        value="{{ $paiement->montant }}"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Mode de paiement
                    </label>

                    <select
                        name="mode_paiement"
                        class="form-control">

                        <option value="Espèces"
                            @selected($paiement->mode_paiement=='Espèces')>
                            Espèces
                        </option>

                        <option value="Virement"
                            @selected($paiement->mode_paiement=='Virement')>
                            Virement
                        </option>

                        <option value="Chèque"
                            @selected($paiement->mode_paiement=='Chèque')>
                            Chèque
                        </option>

                        <option value="Carte bancaire"
                            @selected($paiement->mode_paiement=='Carte bancaire')>
                            Carte bancaire
                        </option>

                    </select>

                </div>

                <button
                    type="submit"
                    class="btn btn-primary">

                    Mettre à jour

                </button>

                <a
                    href="{{ route('paiements.show',$paiement) }}"
                    class="btn btn-secondary">

                    Retour

                </a>

            </form>

        </div>

    </div>

</div>

@endsection