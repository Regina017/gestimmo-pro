@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="mb-4">
        Gestion des biens
    </h1>

    <a href="{{ route('biens.create') }}"
       class="btn btn-success mb-3">
        Ajouter un bien
    </a>

    <table class="table table-bordered table-striped">

        <thead>

            <tr>

                <th>Référence</th>
                <th>Type</th>
                <th>Adresse</th>
                <th>Loyer</th>
                <th>Caution</th>
                <th>Statut</th>
                <th>Actions</th>

            </tr>

        </thead>

        <tbody>

            @forelse($biens as $bien)

                <tr>

                    <td>{{ $bien->reference }}</td>

                    <td>{{ $bien->type }}</td>

                    <td>{{ $bien->adresse }}</td>

                    <td>{{ $bien->loyer }}</td>

                    <td>{{ $bien->caution }}</td>

                    <td>{{ $bien->statut }}</td>

                    <td>

                        <a href="{{ route('biens.edit', $bien) }}"
                           class="btn btn-warning btn-sm">
                            Modifier
                        </a>

                        <form method="POST"
                              action="{{ route('biens.destroy', $bien) }}"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Supprimer ce bien ?')">

                                Supprimer

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7" class="text-center">

                        Aucun bien enregistré

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection