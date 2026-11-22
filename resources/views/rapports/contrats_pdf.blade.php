<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <title>Rapport des Contrats</title>

    <style>

        body{
            font-family: DejaVu Sans, sans-serif;
            font-size:12px;
            color:#333;
            margin:30px;
        }

        .header{
            text-align:center;
            margin-bottom:25px;
        }

        .logo{
            width:120px;
            height:auto;
            margin-bottom:15px;
        }

        .societe{
            text-align:center;
            margin-bottom:20px;
        }

        h1{
            text-align:center;
            color:#0d6efd;
            margin-top:20px;
            margin-bottom:30px;
        }

        table{
            width:100%;
            border-collapse:collapse;
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

        .footer{
            margin-top:40px;
            text-align:center;
            font-size:10px;
            color:#777;
        }

    </style>

</head>

<body>

@php

    $societe = \App\Models\Societe::first();

    $logo = null;

    if ($societe && !empty($societe->logo)) {

        $logoPath = public_path(
            'storage/'.$societe->logo
        );

        if (file_exists($logoPath)) {
            $logo = $logoPath;
        }
    }

@endphp

<div class="header">

    @if($logo)

        <img
            src="{{ $logo }}"
            alt="Logo"
            class="logo">

    @endif

    <div class="societe">

        <h2>
            {{ $societe->nom ?? 'BÂTIMENTS MATHE SEBASTIEN' }}
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

<h1>
    Rapport des Contrats
</h1>

<table>

    <thead>

        <tr>

            <th>ID</th>
            <th>Locataire</th>
            <th>Logement</th>
            <th>Date début</th>
            <th>Date fin</th>
            <th>Loyer</th>
            <th>Statut</th>

        </tr>

    </thead>

    <tbody>

        @forelse($contrats as $contrat)

            <tr>

                <td>
                    {{ $contrat->id }}
                </td>

                <td>

                    {{ $contrat->locataire->nom ?? '' }}

                    {{ $contrat->locataire->prenom ?? '' }}

                </td>

                <td>

                    {{ $contrat->logement->numero ?? '' }}

                </td>

                <td>

                    {{ \Carbon\Carbon::parse($contrat->date_debut)->format('d/m/Y') }}

                </td>

                <td>

                    {{ \Carbon\Carbon::parse($contrat->date_fin)->format('d/m/Y') }}

                </td>

                <td>

                    {{ number_format($contrat->loyer, 2, ',', ' ') }} $

                </td>

                <td>

                    {{ $contrat->statut }}

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="7" style="text-align:center;">

                    Aucun contrat enregistré

                </td>

            </tr>

        @endforelse

    </tbody>

</table>

<div class="footer">

    Rapport généré par GESTIMMO‑PRO

    <br>

    Date :
    {{ now()->format('d/m/Y H:i') }}

</div>

</body>

</html>