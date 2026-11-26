@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                ⚙ Paramètres Société
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

            <form action="{{ route('societe.update') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">
                                Nom de la société
                            </label>

                            <input
                                type="text"
                                name="nom"
                                class="form-control"
                                value="{{ old('nom', $societe->nom) }}"
                                required>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">
                                Téléphone
                            </label>

                            <input
                                type="text"
                                name="telephone"
                                class="form-control"
                                value="{{ old('telephone', $societe->telephone) }}">

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email', $societe->email) }}">

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">
                                Ville
                            </label>

                            <input
                                type="text"
                                name="ville"
                                class="form-control"
                                value="{{ old('ville', $societe->ville) }}">

                        </div>

                    </div>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Adresse
                    </label>

                    <textarea
                        name="adresse"
                        rows="3"
                        class="form-control">{{ old('adresse', $societe->adresse) }}</textarea>

                </div>

                <hr>

                <h5 class="mb-3">
                    🖼 Logo de l'entreprise
                </h5>

                <div class="mb-3">

                    <label class="form-label">
                        Nouveau logo
                    </label>

                    <input
                        type="file"
                        name="logo"
                        class="form-control"
                        accept=".jpg,.jpeg,.png,.webp">

                </div>

                <div class="alert alert-info">

                    <strong>Chemin enregistré :</strong>

                    {{ $societe->logo ?? 'AUCUN LOGO ENREGISTRÉ' }}

                </div>

    @if(!empty($societe->logo))

<div class="mb-4">

    <label class="form-label">
        Logo actuel
    </label>

    <br>

    <img
    src="{{ $societe->logo_url }}"
    alt="Logo"
    style="
        max-width:250px;
        max-height:250px;
        border:1px solid #ddd;
        background:#fff;
        padding:10px;
        object-fit:contain;
    ">

    <div class="mt-3">

       <a
    href="{{ $societe->logo_url }}"
    target="_blank"
    class="btn btn-outline-primary btn-sm">
    Tester le logo
</a>

    </div>

</div>

@else

<div class="alert alert-warning">
    Aucun logo enregistré.
</div>

@endif

                <div class="text-end">

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