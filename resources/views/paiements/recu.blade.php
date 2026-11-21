<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <title>Reçu de paiement</title>

    <style>

        body{
            font-family: DejaVu Sans, sans-serif;
            font-size:12px;
            color:#333;
            margin:30px;
        }

        .header{
            text-align:center;
            margin-bottom:20px;
        }

        .header img{
            width:110px;
        }

        .societe{
            margin-top:10px;
        }

        .titre{
            text-align:center;
            font-size:24px;
            font-weight:bold;
            color:#198754;
            margin:25px 0;
        }

        .numero{
            text-align:right;
            margin-bottom:20px;
            font-weight:bold;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:15px;
        }

        th{
            background:#f5f5f5;
            border:1px solid #ddd;
            padding:10px;
            text-align:left;
            width:35%;
        }

        td{
            border:1px solid #ddd;
            padding:10px;
        }

        .signature{
            margin-top:70px;
            width:100%;
        }

        .signature td{
            border:none;
            text-align:center;
            padding-top:60px;
        }

        .footer{
            margin-top:50px;
            text-align:center;
            font-size:10px;
            color:#777;
        }

        .success{
            color:#198754;
            font-weight:bold;
        }

    </style>

</head>

<body>

@php
    $societe = \App\Models\Societe::first();
@endphp

<div class="header">

    @if($societe && $societe->logo)

        <img
            src="{{ public_path('storage/'.$societe->logo) }}"
            alt="Logo">

    @endif

    <div class="societe">

        <h2>
            {{ $societe->nom ?? 'GESTIMMO-PRO' }}
        </h2>

        <div>
            {{ $societe->adresse ?? '' }}
        </div>

        <div>
            {{ $societe->ville ?? '' }}
        </div>

        <div>
            {{ $societe->telephone ?? '' }}
        </div>

        <div>
            {{ $societe->email ?? '' }}
        </div>

    </div>

</div>

<hr>

<div class="titre">

    REÇU DE PAIEMENT

</div>

<div class="numero">

    N° REC-{{ str_pad($paiement->id, 6, '0', STR_PAD_LEFT) }}

</div>

<table>

    <tr>
        <th>Référence</th>
        <td>
            REC-{{ str_pad($paiement->id, 6, '0', STR_PAD_LEFT) }}
        </td>
    </tr>

    <tr>
        <th>Locataire</th>
        <td>
            {{ $paiement->contrat->locataire->nom ?? '' }}
            {{ $paiement->contrat->locataire->prenom ?? '' }}
        </td>
    </tr>

    <tr>
        <th>Logement</th>
        <td>
            {{ $paiement->contrat->logement->numero ?? '' }}
        </td>
    </tr>

    <tr>
        <th>Date du paiement</th>
        <td>
            {{ $paiement->date_paiement ?? '' }}
        </td>
    </tr>

    <tr>
        <th>Montant payé</th>
        <td>
            {{ number_format($paiement->montant ?? 0, 2, ',', ' ') }} $
        </td>
    </tr>

    <tr>
        <th>Mode de paiement</th>
        <td>
            {{ $paiement->mode_paiement ?? 'Non défini' }}
        </td>
    </tr>

    <tr>
        <th>Statut</th>
        <td class="success">
            Paiement reçu
        </td>
    </tr>

</table>

<div style="margin-top:30px; line-height:1.8;">

    Nous confirmons avoir reçu le paiement mentionné ci-dessus.

    <br><br>

    Le présent reçu est délivré au locataire pour servir et valoir ce que de droit.

</div>

<table class="signature">

    <tr>

        <td>

            ____________________________

            <br><br>

            Signature du gestionnaire

        </td>

        <td>

            ____________________________

            <br><br>

            Signature du locataire

        </td>

    </tr>

</table>

<div class="footer">

    Document généré automatiquement par GESTIMMO‑PRO

    <br>

    Date d'impression :
    {{ now()->format('d/m/Y H:i') }}

</div>

</body>

</html>