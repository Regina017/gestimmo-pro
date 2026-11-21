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

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">
                                Nom
                            </label>

                            <input
                                type="text"
                                name="nom"
                                class="form-control"
                                required>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">
                                Prénom
                            </label>

                            <input
                                type="text"
                                name="prenom"
                                class="form-control"
                                required>

                        </div>

                    </div>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Téléphone
                    </label>

                    <input
                        type="text"
                        name="telephone"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control">

                </div>

                <button
                    type="submit"
                    class="btn btn-success">

                    💾 Enregistrer

                </button>

            </form>

        </div>

    </div>

</div>

@endsection