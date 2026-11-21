@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>🚪 Gestion des logements</h2>

        <a
            href="{{ route('logements.create') }}"
            class="btn btn-primary">

            Nouveau logement

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="card shadow">

        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Immeuble</th>
                        <th>Numéro</th>
                        <th>Type</th>
                        <th>Loyer</th>
                        <th>Statut</th>
                        <th width="250">Actions</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($logements as $logement)

                        <tr>

                            <td>
                                {{ $logement->id }}
                            </td>

                            <td>
                                {{ $logement->immeuble->nom ?? 'Aucun immeuble' }}
                            </td>

                            <td>
                                {{ $logement->numero }}
                            </td>

                            <td>
                                {{ $logement->type }}
                            </td>

                            <td>
                                {{ number_format($logement->loyer, 2, ',', ' ') }} $
                            </td>

                            <td>

                                @if(($logement->statut ?? '') === 'Occupé')

                                    <span class="badge bg-success">

                                        Occupé

                                    </span>

                                @else

                                    <span class="badge bg-warning text-dark">

                                        Vacant

                                    </span>

                                @endif

                            </td>

                            <td>

                                <a
                                    href="{{ route('logements.show', $logement) }}"
                                    class="btn btn-info btn-sm">

                                    Voir

                                </a>

                                <a
                                    href="{{ route('logements.edit', $logement) }}"
                                    class="btn btn-warning btn-sm">

                                    Modifier

                                </a>

                                <form
                                    action="{{ route('logements.destroy', $logement) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Supprimer ce logement ?')">

                                        Supprimer

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="7"
                                class="text-center text-muted">

                                Aucun logement enregistré

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

            <div class="mt-3">

                {{ $logements->links() }}

            </div>

        </div>

    </div>

</div>

@endsection