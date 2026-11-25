@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row mb-4">

        <div class="col-12 text-center">

            <h1 class="fw-bold text-primary">
                GESTIMMO‑PRO
            </h1>

            <p class="text-muted">
                Tableau de bord de gestion immobilière
            </p>

        </div>

    </div>

    @if($totalNotifications > 0)

        <div class="alert alert-warning">

            <h5 class="fw-bold">
                🔔 Alertes système
            </h5>

            <ul class="mb-0">

                @if($impayes > 0)
                    <li>
                        {{ $impayes }} loyer(s) impayé(s)
                    </li>
                @endif

                @if($contratsExpirants > 0)
                    <li>
                        {{ $contratsExpirants }} contrat(s) expirent bientôt
                    </li>
                @endif

                @if($logementsVacants > 0)
                    <li>
                        {{ $logementsVacants }} logement(s) vacant(s)
                    </li>
                @endif

                @if($contratsEnRetard > 0)
                    <li>
                        {{ $contratsEnRetard }} contrat(s) expiré(s)
                    </li>
                @endif

            </ul>

        </div>

    @endif

    <div class="row g-4">

        <div class="col-lg-3">

            <div class="card bg-primary text-white shadow">

                <div class="card-body text-center">

                    <h6>🏢 Immeubles</h6>

                    <h2>{{ $totalImmeubles }}</h2>

                </div>

            </div>

        </div>

        <div class="col-lg-3">

            <div class="card bg-success text-white shadow">

                <div class="card-body text-center">

                    <h6>🏠 Logements</h6>

                    <h2>{{ $totalBiens }}</h2>

                </div>

            </div>

        </div>

        <div class="col-lg-3">

            <div class="card bg-info text-white shadow">

                <div class="card-body text-center">

                    <h6>👥 Locataires</h6>

                    <h2>{{ $totalLocataires }}</h2>

                </div>

            </div>

        </div>

        <div class="col-lg-3">

            <div class="card bg-warning shadow">

                <div class="card-body text-center">

                    <h6>📄 Contrats</h6>

                    <h2>{{ $totalContrats }}</h2>

                </div>

            </div>

        </div>

    </div>

    <div class="row g-4 mt-3">

        <div class="col-lg-3">

            <div class="card bg-success text-white shadow">

                <div class="card-body text-center">

                    <h6>💰 Revenus</h6>

                    <h3>
                        {{ number_format($revenus, 0, ',', ' ') }}
                    </h3>

                </div>

            </div>

        </div>

        <div class="col-lg-3">

            <div class="card bg-danger text-white shadow">

                <div class="card-body text-center">

                    <h6>💳 Dépenses</h6>

                    <h3>
                        {{ number_format($depenses, 0, ',', ' ') }}
                    </h3>

                </div>

            </div>

        </div>

        <div class="col-lg-3">

            <div class="card bg-primary text-white shadow">

                <div class="card-body text-center">

                    <h6>📈 Bénéfice</h6>

                    <h3>
                        {{ number_format($benefice, 0, ',', ' ') }}
                    </h3>

                </div>

            </div>

        </div>

        <div class="col-lg-3">

            <div class="card bg-dark text-white shadow">

                <div class="card-body text-center">

                    <h6>🔔 Notifications</h6>

                    <h3>
                        {{ $totalNotifications }}
                    </h3>

                </div>

            </div>

        </div>

    </div>

    <div class="row g-4 mt-3">

        <div class="col-lg-3">

            <div class="card bg-danger text-white shadow">

                <div class="card-body text-center">

                    <h5>🔴 Impayés</h5>

                    <h1>{{ $impayes }}</h1>

                </div>

            </div>

        </div>

        <div class="col-lg-3">

            <div class="card bg-warning shadow">

                <div class="card-body text-center">

                    <h5>⚠ Contrats expirants</h5>

                    <h1>{{ $contratsExpirants }}</h1>

                </div>

            </div>

        </div>

        <div class="col-lg-3">

            <div class="card bg-info text-white shadow">

                <div class="card-body text-center">

                    <h5>🏠 Logements vacants</h5>

                    <h1>{{ $logementsVacants }}</h1>

                </div>

            </div>

        </div>

        <div class="col-lg-3">

            <div class="card bg-secondary text-white shadow">

                <div class="card-body text-center">

                    <h5>⏳ Échéances</h5>

                    <h1>{{ $echeancesLoyer }}</h1>

                </div>

            </div>

        </div>

    </div>

    <div class="row mt-4">

        <div class="col-12">

            <div class="card border-danger shadow">

                <div class="card-body text-center">

                    <h4 class="text-danger">

                        🚨 Contrats expirés

                    </h4>

                    <h1 class="display-4">

                        {{ $contratsEnRetard }}

                    </h1>

                </div>

            </div>

        </div>

    </div>

    <div class="card shadow mt-4">

        <div class="card-header bg-dark text-white">

            Paiements récents

        </div>

        <div class="card-body">

            <table class="table table-striped">

                <thead>

                    <tr>

                        <th>Date</th>
                        <th>Montant</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($paiementsRecents as $paiement)

                        <tr>

                            <td>

                                {{ \Carbon\Carbon::parse($paiement->date_paiement)->format('d/m/Y') }}

                            </td>

                            <td>

                                {{ number_format($paiement->montant, 0, ',', ' ') }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="2" class="text-center">

                                Aucun paiement enregistré

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection