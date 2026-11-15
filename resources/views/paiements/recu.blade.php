<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <title>Reçu de paiement</title>

    <style>

        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 30px;
            color: #333;
            font-size: 14px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            width: 220px;
            height: auto;
            margin-bottom: 15px;
        }

        .title {
            font-size: 30px;
            font-weight: bold;
            color: #198754;
            margin-bottom: 5px;
        }

        .company {
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
        }

        .description {
            font-size: 12px;
            color: #888;
            margin-bottom: 15px;
        }

        .receipt-number {
            display: inline-block;
            padding: 8px 15px;
            background: #f5f5f5;
            border: 1px solid #ddd;
            font-weight: bold;
            color: #444;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        td {
            border: 1px solid #ddd;
            padding: 12px;
        }

        .label {
            width: 35%;
            background: #f5f5f5;
            font-weight: bold;
        }

        .success {
            color: #198754;
            font-weight: bold;
        }

        .warning {
            color: #fd7e14;
            font-weight: bold;
        }

        .signature {
            margin-top: 70px;
        }

        .footer {
            margin-top: 70px;
            text-align: center;
            color: #777;
            font-size: 12px;
        }

    </style>

</head>

<body>

    <div class="header">

        @php
            $logo = public_path('images/logo.png');
        @endphp

        @if(file_exists($logo))

            <img
                src="{{ $logo }}"
                alt="Logo"
                class="logo"
            >

        @endif

        <div class="title">
            REÇU DE PAIEMENT
        </div>

        <div class="company">
            BÂTIMENTS MATHE SÉBASTIEN
        </div>

        <div class="description">
            Gestion Immobilière Professionnelle
        </div>

        <div class="receipt-number">
            N° REC-{{ str_pad($paiement->id, 6, '0', STR_PAD_LEFT) }}
        </div>

    </div>

    <table>

        <tr>
            <td class="label">Locataire</td>
            <td>
                {{ $occupation->locataire->nom ?? 'Non disponible' }}
            </td>
        </tr>

        <tr>
            <td class="label">Bien</td>
            <td>
                {{ $occupation->bien->reference ?? 'Non disponible' }}
            </td>
        </tr>

        <tr>
            <td class="label">Date du paiement</td>
            <td>
                {{ \Carbon\Carbon::parse($paiement->date_paiement)->format('d/m/Y') }}
            </td>
        </tr>

        <tr>
            <td class="label">Montant payé</td>
            <td>
                {{ number_format($paiement->montant, 2) }} $
            </td>
        </tr>

        <tr>
            <td class="label">Reste à payer</td>
            <td>
                {{ number_format($paiement->reste, 2) }} $
            </td>
        </tr>

        <tr>
            <td class="label">Statut</td>

            <td>

                @if($paiement->reste > 0)

                    <span class="warning">
                        Paiement partiel
                    </span>

                @else

                    <span class="success">
                        Paiement complet
                    </span>

                @endif

            </td>

        </tr>

    </table>

    <div class="signature">

        Je soussigné confirme avoir reçu le montant indiqué ci-dessus.

        <br><br><br>

        Signature :

        ________________________________________

    </div>

    <div class="footer">

        <strong>BÂTIMENTS MATHE SÉBASTIEN</strong>

        <br>

        GESTIMMO PRO v1.3

        <br><br>

        Reçu généré automatiquement le

        {{ now()->format('d/m/Y à H:i') }}

    </div>

</body>

</html>