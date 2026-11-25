@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-info text-white">
            Détails de la dépense
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th>Date</th>
                    <td>{{ $depense->date_depense }}</td>
                </tr>

                <tr>
                    <th>Catégorie</th>
                    <td>{{ $depense->categorie }}</td>
                </tr>

                <tr>
                    <th>Libellé</th>
                    <td>{{ $depense->libelle }}</td>
                </tr>

                <tr>
                    <th>Montant</th>
                    <td>{{ number_format($depense->montant,2) }}</td>
                </tr>

            </table>

            <a href="{{ route('depenses.index') }}"
               class="btn btn-secondary">
                ← Retour
            </a>

        </div>

    </div>

</div>

@endsection