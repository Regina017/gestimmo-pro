@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-warning">

            <h4 class="mb-0">
                ✏ Modifier propriétaire
            </h4>

        </div>

        <div class="card-body">

            <form action="{{ route('proprietaires.update',$proprietaire) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label>Nom</label>

                            <input type="text"
                                   name="nom"
                                   class="form-control"
                                   value="{{ $proprietaire->nom }}"
                                   required>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label>Prénom</label>

                            <input type="text"
                                   name="prenom"
                                   class="form-control"
                                   value="{{ $proprietaire->prenom }}"
                                   required>

                        </div>

                    </div>

                </div>

                <div class="mb-3">

                    <label>Téléphone</label>

                    <input type="text"
                           name="telephone"
                           class="form-control"
                           value="{{ $proprietaire->telephone }}">

                </div>

                <div class="mb-3">

                    <label>Email</label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ $proprietaire->email }}">

                </div>

                <button class="btn btn-success">

                    Mettre à jour

                </button>

            </form>

        </div>

    </div>

</div>

@endsection