@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-warning">

            <h4 class="mb-0">

                ✏️ Modifier logement

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
                action="{{ route('logements.update',$logement) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">

                                Numéro

                            </label>

                            <input
                                type="text"
                                name="numero"
                                value="{{ old('numero',$logement->numero) }}"
                                class="form-control"
                                required>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">

                                Type

                            </label>

                            <input
                                type="text"
                                name="type"
                                value="{{ old('type',$logement->type) }}"
                                class="form-control"
                                required>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">

                                Loyer

                            </label>

                            <input
                                type="number"
                                step="0.01"
                                name="loyer"
                                value="{{ old('loyer',$logement->loyer) }}"
                                class="form-control"
                                required>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">

                                Immeuble

                            </label>

                            <select
                                name="immeuble_id"
                                class="form-select"
                                required>

                                <option value="">

                                    -- Sélectionner --

                                </option>

                                @foreach($immeubles as $immeuble)

                                    <option
                                        value="{{ $immeuble->id }}"
                                        {{ $logement->immeuble_id == $immeuble->id ? 'selected' : '' }}>

                                        {{ $immeuble->nom }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                    </div>

                </div>

                <div class="text-end">

                    <a
                        href="{{ route('logements.index') }}"
                        class="btn btn-secondary">

                        Retour

                    </a>

                    <button
                        type="submit"
                        class="btn btn-success">

                        💾 Mettre à jour

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection