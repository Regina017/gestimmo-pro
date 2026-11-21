@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between mb-3">
        <h2>Propriétaires</h2>

        <a href="{{ route('proprietaires.create') }}"
           class="btn btn-primary">
            Nouveau propriétaire
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th width="220">Actions</th>
            </tr>
        </thead>

        <tbody>

        @forelse($proprietaires as $proprietaire)

            <tr>
                <td>{{ $proprietaire->id }}</td>
                <td>{{ $proprietaire->nom }}</td>
                <td>{{ $proprietaire->prenom }}</td>
                <td>{{ $proprietaire->telephone }}</td>
                <td>{{ $proprietaire->email }}</td>

                <td>

                    <a href="{{ route('proprietaires.show',$proprietaire) }}"
                       class="btn btn-info btn-sm">
                        Voir
                    </a>

                    <a href="{{ route('proprietaires.edit',$proprietaire) }}"
                       class="btn btn-warning btn-sm">
                        Modifier
                    </a>

                    <form
                        action="{{ route('proprietaires.destroy',$proprietaire) }}"
                        method="POST"
                        class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Supprimer ?')">

                            Supprimer

                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="6" class="text-center">
                    Aucun propriétaire trouvé
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

    {{ $proprietaires->links() }}

</div>

@endsection