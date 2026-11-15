@extends('layouts.app')

@section('content')

<h1>Approbations</h1>

<table class="table table-bordered">

    <thead>

        <tr>

            <th>Module</th>
            <th>Action</th>
            <th>Utilisateur</th>
            <th>Statut</th>
            <th>Actions</th>

        </tr>

    </thead>

    <tbody>

    @foreach($approbations as $approbation)

        <tr>

            <td>{{ $approbation->module }}</td>

            <td>{{ $approbation->action }}</td>

            <td>{{ $approbation->utilisateur }}</td>

            <td>{{ $approbation->statut }}</td>

            <td>

                <a
                    href="{{ route('approbations.approve', $approbation->id) }}"
                    class="btn btn-success btn-sm">

                    Approuver

                </a>

                <a
                    href="{{ route('approbations.reject', $approbation->id) }}"
                    class="btn btn-danger btn-sm">

                    Refuser

                </a>

            </td>

        </tr>

    @endforeach

    </tbody>

</table>

@endsection