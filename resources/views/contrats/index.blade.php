@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm border-0 mb-4">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h2 class="fw-bold mb-0">

                        <i class="fas fa-file-signature text-primary"></i>

                        Gestion des Contrats

                    </h2>

                    <small class="text-muted">

                        Gestion des baux et contrats de location

                    </small>

                </div>

                <div>

                    <a href="{{ route('export.contrats') }}"
                       class="btn btn-success">

                        <i class="fas fa-file-excel"></i>

                        Export Excel

                    </a>

                    <a href="{{ route('contrats.create') }}"
                       class="btn btn-primary">

                        <i class="fas fa-plus"></i>

                        Nouveau contrat

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

                        <th>Date début</th>

                        <th>Date fin</th>

                        <th>Loyer</th>

                        <th>Statut</th>

                        <th width="300">Actions</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($contrats as $contrat)

                        <tr>

                            <td>
                                {{ $contrat->id }}
                            </td>

                            <td>
                                {{ optional($contrat->date_debut)->format('d/m/Y') ?? $contrat->date_debut }}
                            </td>

                            <td>
                                {{ optional($contrat->date_fin)->format('d/m/Y') ?? $contrat->date_fin }}
                            </td>

                            <td class="fw-bold text-success">

                                {{ number_format((float)$contrat->loyer, 2, ',', ' ') }} $

                            </td>

                            <td>

                                @if($contrat->statut === 'Actif')

                                    <span class="badge bg-success">

                                        Actif

                                    </span>

                                @else

                                    <span class="badge bg-secondary">

                                        {{ $contrat->statut }}

                                    </span>

                                @endif

                            </td>

                            <td>

                                <a href="{{ route('contrats.show', $contrat) }}"
                                   class="btn btn-info btn-sm">

                                    <i class="fas fa-eye"></i>

                                </a>

                                <a href="{{ route('contrats.edit', $contrat) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="fas fa-pen"></i>

                                </a>

                                <a href="{{ route('contrats.pdf', $contrat) }}"
                                   class="btn btn-secondary btn-sm">

                                    <i class="fas fa-file-pdf"></i>

                                </a>

                                <form action="{{ route('contrats.destroy', $contrat) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Supprimer ce contrat ?')">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6"
                                class="text-center">

                                Aucun contrat enregistré

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

            <div class="mt-3">

                {{ $contrats->links() }}

            </div>

        </div>

    </div>

</div>

@endsection