@extends('layouts.app')

@section('content')

<h1 class="mb-4">

    📅 Échéancier des loyers

</h1>

<div class="card">

    <div class="card-body">

        <table class="table table-bordered table-striped">

            <thead>

                <tr>

                    <th>Locataire</th>

                    <th>Bien</th>

                    <th>Loyer</th>

                    <th>Date fin</th>

                    <th>Statut</th>

                </tr>

            </thead>

            <tbody>

                @forelse($occupations as $occupation)

                    <tr>

                        <td>

                            {{ $occupation->locataire->prenom ?? '' }}
                            {{ $occupation->locataire->nom ?? '' }}

                        </td>

                        <td>

                            {{ $occupation->bien->reference ?? '' }}
                            -
                            {{ $occupation->bien->type ?? '' }}

                        </td>

                        <td>

                            {{ number_format($occupation->bien->loyer ?? 0, 2) }} $

                        </td>

                        <td>

                            {{ $occupation->date_sortie ?? 'Indéterminée' }}

                        </td>

                        <td>

                            @if(
                                $occupation->date_sortie &&
                                strtotime($occupation->date_sortie) < time()
                            )

                                <span class="badge bg-danger">

                                    🔴 En retard

                                </span>

                            @elseif(
                                $occupation->date_sortie &&
                                strtotime($occupation->date_sortie) <= strtotime('+30 days')
                            )

                                <span class="badge bg-warning text-dark">

                                    🟠 Expire bientôt

                                </span>

                            @else

                                <span class="badge bg-success">

                                    ✅ Actif

                                </span>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5">

                            Aucun enregistrement trouvé

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection