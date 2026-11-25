@extends('layouts.app')

@section('content')

<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm border-0 mb-4">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h2 class="fw-bold mb-0">
                        <i class="fas fa-receipt text-danger"></i>
                        Gestion des Dépenses
                    </h2>

                    <small class="text-muted">
                        Suivi des dépenses de l'entreprise
                    </small>

                </div>

                <div>

                    <a href="{{ route('export.depenses') }}"
                       class="btn btn-success">

                        <i class="fas fa-file-excel"></i>
                        Export Excel

                    </a>

                    <a href="{{ route('depenses.create') }}"
                       class="btn btn-primary">

                        <i class="fas fa-plus"></i>
                        Nouvelle dépense

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

                        <th>Date</th>

                        <th>Catégorie</th>

                        <th>Libellé</th>

                        <th>Montant</th>

                        <th width="250">
                            Actions
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($depenses as $depense)

                    <tr>

                        <td>
                            {{ $depense->date_depense }}
                        </td>

                        <td>
                            <span class="badge bg-info">
                                {{ $depense->categorie }}
                            </span>
                        </td>

                        <td>
                            {{ $depense->libelle }}
                        </td>

                        <td class="fw-bold text-danger">
                            {{ number_format($depense->montant,2,',',' ') }}
                        </td>

                        <td>

                            <a href="{{ route('depenses.show',$depense) }}"
                               class="btn btn-info btn-sm">

                                Voir

                            </a>

                            <a href="{{ route('depenses.edit',$depense) }}"
                               class="btn btn-warning btn-sm">

                                Modifier

                            </a>

                            <form action="{{ route('depenses.destroy',$depense) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Supprimer cette dépense ?')">

                                    Supprimer

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="5" class="text-center">

                            Aucune dépense enregistrée

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection