@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row mb-4">
        <div class="col-12 text-center">

            <img
                src="{{ asset('images/logo.png') }}"
                alt="Logo"
                style="max-height:120px;"
                class="mb-3">

            <h1 class="fw-bold text-primary">
                GESTIMMO-PRO
            </h1>

            <p class="text-muted">
                Tableau de bord de gestion immobilière
            </p>

        </div>
    </div>

    <div class="row g-4">

        <div class="col-lg-3 col-md-6">
            <div class="card shadow border-0 bg-primary text-white">
                <div class="card-body text-center">
                    <h6>🏢 Immeubles</h6>
                    <h2>{{ $totalImmeubles }}</h2>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow border-0 bg-success text-white">
                <div class="card-body text-center">
                    <h6>🏠 Logements</h6>
                    <h2>{{ $totalBiens }}</h2>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow border-0 bg-info text-white">
                <div class="card-body text-center">
                    <h6>👥 Locataires</h6>
                    <h2>{{ $totalLocataires }}</h2>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow border-0 bg-warning">
                <div class="card-body text-center">
                    <h6>📄 Contrats actifs</h6>
                    <h2>{{ $totalContrats }}</h2>
                </div>
            </div>
        </div>

    </div>

    <div class="row g-4 mt-2">

        <div class="col-lg-3 col-md-6">
            <div class="card shadow border-0 bg-success text-white">
                <div class="card-body text-center">
                    <h6>💰 Revenus du mois</h6>
                    <h3>{{ number_format($revenus, 0, ',', ' ') }}</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow border-0 bg-danger text-white">
                <div class="card-body text-center">
                    <h6>💳 Dépenses</h6>
                    <h3>{{ number_format($depenses, 0, ',', ' ') }}</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow border-0 bg-primary text-white">
                <div class="card-body text-center">
                    <h6>📈 Bénéfice</h6>
                    <h3>{{ number_format($benefice, 0, ',', ' ') }}</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow border-0 bg-dark text-white">
                <div class="card-body text-center">
                    <h6>🔔 Notifications</h6>
                    <h3>{{ $totalNotifications }}</h3>
                </div>
            </div>
        </div>

    </div>

    <div class="row g-4 mt-2">

        <div class="col-lg-4">
            <div class="card shadow border-0 bg-danger text-white">
                <div class="card-body text-center">
                    <h5>🔴 Impayés</h5>
                    <h1>{{ $impayes }}</h1>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow border-0 bg-warning">
                <div class="card-body text-center">
                    <h5>⚠ Contrats expirants</h5>
                    <h1>{{ $contratsExpirants }}</h1>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow border-0 bg-info text-white">
                <div class="card-body text-center">
                    <h5>🏠 Logements libres</h5>
                    <h1>{{ $logementsVacants }}</h1>
                </div>
            </div>
        </div>

    </div>

    <div class="row mt-5">

        <div class="col-lg-4 mb-4">
            <div class="card shadow border-0">
                <div class="card-header bg-success text-white">
                    Revenus / Dépenses
                </div>
                <div class="card-body">
                    <canvas id="revenusDepensesChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card shadow border-0">
                <div class="card-header bg-warning">
                    Évolution des impayés
                </div>
                <div class="card-body">
                    <canvas id="impayesChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white">
                    Bénéfices / Locataires
                </div>
                <div class="card-body">
                    <canvas id="beneficeLocataireChart"></canvas>
                </div>
            </div>
        </div>

    </div>

    <div class="card shadow border-0 mt-4">

        <div class="card-header bg-dark text-white">
            Paiements récents
        </div>

        <div class="card-body table-responsive">

            <table class="table table-striped align-middle">

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
                                {{ number_format($paiement->montant,0,',',' ') }}
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="2" class="text-center">
                                Aucun paiement
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

new Chart(
    document.getElementById('revenusDepensesChart'),
    {
        type: 'pie',
        data: {
            labels: ['Revenus','Dépenses'],
            datasets: [{
                data: [
                    {{ $revenus }},
                    {{ $depenses }}
                ],
                backgroundColor: [
                    '#198754',
                    '#dc3545'
                ]
            }]
        }
    }
);

new Chart(
    document.getElementById('impayesChart'),
    {
        type: 'line',
        data: {
            labels: [
                'Jan','Fév','Mar','Avr',
                'Mai','Juin','Juil','Août',
                'Sep','Oct','Nov','Déc'
            ],
            datasets: [{
                label: 'Impayés',
                data: @json($impayesParMois),
                borderColor: '#ffc107',
                backgroundColor: 'rgba(255,193,7,0.2)',
                fill: true,
                tension: 0.4
            }]
        }
    }
);

new Chart(
    document.getElementById('beneficeLocataireChart'),
    {
        type: 'bar',
        data: {
            labels: [
                'Bénéfice',
                'Locataires'
            ],
            datasets: [{
                data: [
                    {{ $benefice }},
                    {{ $nbLocataires }}
                ],
                backgroundColor: [
                    '#0d6efd',
                    '#20c997'
                ]
            }]
        },
        options:{
            responsive:true,
            plugins:{
                legend:{
                    display:false
                }
            }
        }
    }
);

</script>

@endsection