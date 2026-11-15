@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="mb-4">
        Dashboard GESTIMMO PRO
    </h1>

    @if(count($notifications) > 0)

        <h4 class="mb-3">
            🚨 Alertes professionnelles
        </h4>

        @foreach($notifications as $notification)

            <div class="alert alert-{{ $notification['type'] }}">

                {{ $notification['message'] }}

            </div>

        @endforeach

    @endif

    <div class="row">

        <div class="col-md-4">
            <div class="card bg-primary text-white mb-3">
                <div class="card-body">
                    <h5>🏠 Biens</h5>
                    <h2>{{ $biens }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-success text-white mb-3">
                <div class="card-body">
                    <h5>👥 Locataires</h5>
                    <h2>{{ $locataires }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-secondary text-white mb-3">
                <div class="card-body">
                    <h5>🏠 Biens vacants</h5>
                    <h2>{{ $biensVacants }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">

            <div class="card bg-dark text-white mb-3">

                <div class="card-body">

                    <h5>📊 Taux d'occupation</h5>

                    <p class="mb-1">
                        Occupés : {{ $biensOccupes }}
                    </p>

                    <p class="mb-2">
                        Vacants : {{ $biensVacants }}
                    </p>

                    <div class="progress">

                        <div
                            class="progress-bar bg-success"
                            role="progressbar"
                            style="width: {{ $tauxOccupation }}%;">

                            {{ $tauxOccupation }} %

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-4">
            <div class="card bg-dark text-white mb-3">
                <div class="card-body">
                    <h5>👤 Utilisateurs</h5>
                    <h2>{{ $utilisateurs }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-warning text-dark mb-3">
                <div class="card-body">
                    <h5>💵 Revenus</h5>
                    <h2>{{ number_format($paiements, 2) }} $</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-danger text-white mb-3">
                <div class="card-body">
                    <h5>💸 Dépenses</h5>
                    <h2>{{ number_format($depenses, 2) }} $</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-info text-white mb-3">
                <div class="card-body">
                    <h5>💰 Solde actuel</h5>
                    <h2>{{ number_format($solde, 2) }} $</h2>
                </div>
            </div>
        </div>

    </div>

    <!-- Graphique Revenus / Dépenses -->

    <div class="card mt-4">

        <div class="card-header">
            <h5>📈 Revenus vs Dépenses</h5>
        </div>

        <div class="card-body">
            <canvas id="financeChart"></canvas>
        </div>

    </div>

    <!-- Graphique Mensuel -->

    <div class="card mt-4">

        <div class="card-header">
            <h5>📊 Statistiques mensuelles</h5>
        </div>

        <div class="card-body">

            <canvas id="monthlyChart"></canvas>

        </div>

    </div>

    <!-- Contrats arrivant à expiration -->

    <div class="card mt-4">

        <div class="card-header bg-warning">

            <h5 class="mb-0">
                📅 Contrats arrivant à expiration
            </h5>

        </div>

        <div class="card-body">

            @if($contratsExpiration->count())

                <div class="table-responsive">

                    <table class="table table-striped table-hover">

                        <thead>

                            <tr>

                                <th>Locataire</th>

                                <th>Bien</th>

                                <th>Date de sortie</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($contratsExpiration as $occupation)

                                <tr>

                                    <td>
                                        {{ $occupation->locataire->nom ?? 'N/A' }}
                                    </td>

                                    <td>
                                        {{ $occupation->bien->reference ?? 'N/A' }}
                                    </td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($occupation->date_sortie)->format('d/m/Y') }}
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="alert alert-success mb-0">

                    ✅ Aucun contrat n'expire dans les 30 prochains jours.

                </div>

            @endif

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

/*
|--------------------------------------------------------------------------
| Revenus / Dépenses
|--------------------------------------------------------------------------
*/

const financeCtx = document.getElementById('financeChart');

new Chart(financeCtx, {

    type: 'bar',

    data: {

        labels: [
            'Revenus',
            'Dépenses'
        ],

        datasets: [{

            label: 'Montant ($)',

            data: [
                {{ $paiements }},
                {{ $depenses }}
            ],

            backgroundColor: [
                '#198754',
                '#dc3545'
            ]

        }]

    },

    options: {

        responsive: true,

        plugins: {

            legend: {
                display: false
            }

        }

    }

});

/*
|--------------------------------------------------------------------------
| Statistiques mensuelles
|--------------------------------------------------------------------------
*/

const monthlyCtx =
document.getElementById('monthlyChart');

new Chart(monthlyCtx, {

    type: 'line',

    data: {

        labels: [

            'Jan',
            'Fév',
            'Mar',
            'Avr',
            'Mai',
            'Juin',
            'Juil',
            'Août',
            'Sep',
            'Oct',
            'Nov',
            'Déc'

        ],

        datasets: [

            {

                label: 'Revenus',

                data: @json($revenusMensuels),

                borderColor: '#198754',

                backgroundColor: '#198754',

                tension: 0.3

            },

            {

                label: 'Dépenses',

                data: @json($depensesMensuelles),

                borderColor: '#dc3545',

                backgroundColor: '#dc3545',

                tension: 0.3

            },

            {

                label: 'Solde',

                data: @json($soldeMensuel),

                borderColor: '#0dcaf0',

                backgroundColor: '#0dcaf0',

                tension: 0.3

            }

        ]

    },

    options: {

        responsive: true,

        plugins: {

            legend: {
                position: 'top'
            }

        }

    }

});

</script>

@endsection