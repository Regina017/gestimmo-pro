@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                🚪 Nouveau logement
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
                action="{{ route('logements.store') }}"
                method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">
                                Numéro
                            </label>

                            <input
                                type="text"
                                name="numero"
                                class="form-control"
                                value="{{ old('numero') }}"
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
                                class="form-control"
                                value="{{ old('type') }}"
                                placeholder="Appartement, Studio, Bureau..."
                                required>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">
                                Loyer mensuel
                            </label>

                            <input
                                type="number"
                                step="0.01"
                                name="loyer"
                                class="form-control"
                                value="{{ old('loyer') }}"
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
                                    -- Sélectionner un immeuble --
                                </option>

                                @foreach($immeubles as $immeuble)

                                    <option
                                        value="{{ $immeuble->id }}"
                                        {{ old('immeuble_id') == $immeuble->id ? 'selected' : '' }}>

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

                        💾 Enregistrer

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection