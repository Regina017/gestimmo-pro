@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm border-0 mb-4">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h2 class="fw-bold mb-0">
                        <i class="fas fa-users text-primary"></i>
                        Gestion des Locataires
                    </h2>

                    <small class="text-muted">
                        Liste complète des locataires enregistrés
                    </small>
                </div>

                <div>

                    <a href="{{ route('export.locataires') }}"
                       class="btn btn-success">

                        <i class="fas fa-file-excel"></i>

                        Export Excel

                    </a>

                    <a href="{{ route('locataires.create') }}"
                       class="btn btn-primary">

                        <i class="fas fa-plus"></i>

                        Nouveau locataire

                    </a>

                </div>

            </div>

        </div>

    </div>

    <div class="card shadow border-0">

        <div class="card-body table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-dark">

                <tr>

                    <th>ID</th>

                    <th>Nom</th>

                    <th>Téléphone</th>

                    <th>Email</th>

                </tr>

                </thead>

                <tbody>

                @forelse($locataires as $locataire)

                    <tr>

                        <td>
                            {{ $locataire->id }}
                        </td>

                        <td>
                            {{ $locataire->nom }}
                        </td>

                        <td>
                            {{ $locataire->telephone }}
                        </td>

                        <td>
                            {{ $locataire->email }}
                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" class="text-center">

                            Aucun locataire enregistré

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection