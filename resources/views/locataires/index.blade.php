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

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"></button>

        </div>

    @endif

    <div class="card shadow border-0">

        <div class="card-body table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>

                        <th>Nom</th>

                        <th>Téléphone</th>

                        <th>Email</th>

                        <th width="220">Actions</th>

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
                            {{ $locataire->prenom }}
                        </td>

                        <td>
                            {{ $locataire->telephone }}
                        </td>

                        <td>
                            {{ $locataire->email }}
                        </td>

                        <td>

                            <a href="{{ route('locataires.show', $locataire) }}"
                               class="btn btn-info btn-sm">

                                <i class="fas fa-eye"></i>

                            </a>

                            <a href="{{ route('locataires.edit', $locataire) }}"
                               class="btn btn-warning btn-sm">

                                <i class="fas fa-pen"></i>

                            </a>

                            <form action="{{ route('locataires.destroy', $locataire) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Supprimer ce locataire ?')">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5"
                            class="text-center">

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