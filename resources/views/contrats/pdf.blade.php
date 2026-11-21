<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <title>Contrat de location</title>

    <style>

        body{
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
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

        .title{
            text-align:center;
            font-size:24px;
            font-weight:bold;
            margin:25px 0;
            color:#0d6efd;
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
            background:#f2f2f2;
            border:1px solid #ddd;
            padding:10px;
            text-align:left;
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

<div class="title">

    CONTRAT DE LOCATION

</div>

<div class="numero">

    N° CTR-{{ str_pad($contrat->id, 6, '0', STR_PAD_LEFT) }}

</div>

<table>

    <tr>
        <th width="35%">
            Locataire
        </th>
        <td>
            {{ $contrat->locataire->nom ?? '' }}
            {{ $contrat->locataire->prenom ?? '' }}
        </td>
    </tr>

    <tr>
        <th>
            Logement
        </th>
        <td>
            {{ $contrat->logement->numero ?? '' }}
        </td>
    </tr>

    <tr>
        <th>
            Date de début
        </th>
        <td>
            {{ $contrat->date_debut ?? '' }}
        </td>
    </tr>

    <tr>
        <th>
            Date de fin
        </th>
        <td>
            {{ $contrat->date_fin ?? '' }}
        </td>
    </tr>

    <tr>
        <th>
            Loyer mensuel
        </th>
        <td>
            {{ number_format($contrat->loyer ?? 0, 2, ',', ' ') }} $
        </td>
    </tr>

    <tr>
        <th>
            Caution
        </th>
        <td>
            {{ number_format($contrat->caution ?? 0, 2, ',', ' ') }} $
        </td>
    </tr>

    <tr>
        <th>
            Statut
        </th>
        <td>
            {{ $contrat->statut ?? 'Actif' }}
        </td>
    </tr>

</table>

<div style="margin-top:30px; line-height:1.8;">

    Le présent contrat de location est conclu entre le propriétaire et le locataire mentionné ci-dessus.

    <br><br>

    Le locataire reconnaît avoir pris connaissance des conditions du bail et s'engage à payer le loyer aux échéances prévues.

    <br><br>

    Le propriétaire s'engage à mettre à disposition le logement dans un état conforme à son usage.

</div>

<table class="signature">

    <tr>

        <td>

            ____________________________

            <br><br>

            Signature du propriétaire

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