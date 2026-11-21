@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-header">

                    Mot de passe oublié

                </div>

                <div class="card-body">

                    @if(session('status'))

                        <div class="alert alert-success">

                            {{ session('status') }}

                        </div>

                    @endif

                    <form method="POST"
                          action="{{ route('password.email') }}">

                        @csrf

                        <div class="mb-3">

                            <label>Email</label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                required>

                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary">

                            Envoyer le lien

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection