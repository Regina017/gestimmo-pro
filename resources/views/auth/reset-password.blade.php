@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-header">

                    Réinitialisation

                </div>

                <div class="card-body">

                    <form method="POST"
                          action="{{ route('password.store') }}">

                        @csrf

                        <input
                            type="hidden"
                            name="token"
                            value="{{ request()->route('token') }}">

                        <div class="mb-3">

                            <label>Email</label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                required>

                        </div>

                        <div class="mb-3">

                            <label>Nouveau mot de passe</label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                required>

                        </div>

                        <div class="mb-3">

                            <label>Confirmation</label>

                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                                required>

                        </div>

                        <button
                            class="btn btn-success">

                            Réinitialiser

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection