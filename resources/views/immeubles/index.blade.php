@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between mb-3">
        <h2>Immeubles</h2>

        <a href="{{ route('immeubles.create') }}" class="btn btn-primary">
            Nouvel immeuble
        </a>
    </div>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Ville</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

        @foreach($immeubles as $immeuble)

            <tr>
                <td>{{ $immeuble->id }}</td>
                <td>{{ $immeuble->nom }}</td>
                <td>{{ $immeuble->adresse }}</td>
                <td>{{ $immeuble->ville }}</td>

                <td>

                    <a href="{{ route('immeubles.show',$immeuble) }}" class="btn btn-info btn-sm">
                        Voir
                    </a>

                    <a href="{{ route('immeubles.edit',$immeuble) }}" class="btn btn-warning btn-sm">
                        Modifier
                    </a>

                    <form action="{{ route('immeubles.destroy',$immeuble) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm">
                            Supprimer
                        </button>

                    </form>

                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

</div>

@endsection