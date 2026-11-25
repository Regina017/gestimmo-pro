<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <title>GESTIMMO‑PRO</title>

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
            width:140px;
            height:auto;
            margin-bottom:10px;
        }

        .societe{
            text-align:center;
            margin-bottom:20px;
        }

        .societe h2{
            margin:5px 0;
            color:#0d6efd;
        }

        .titre{
            text-align:center;
            font-size:22px;
            font-weight:bold;
            margin:25px 0;
            color:#111827;
        }

        hr{
            border:none;
            border-top:1px solid #d1d5db;
            margin:15px 0;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:15px;
        }

        th{
            background:#f3f4f6;
            border:1px solid #d1d5db;
            padding:8px;
            text-align:left;
        }

        td{
            border:1px solid #d1d5db;
            padding:8px;
        }

        .text-center{
            text-align:center;
        }

        .text-right{
            text-align:right;
        }

        .footer{
            margin-top:40px;
            text-align:center;
            font-size:10px;
            color:#6b7280;
        }

        .footer hr{
            margin-bottom:10px;
        }

    </style>

</head>

<body>
    <div style="color:red;font-size:30px;">
    TEST PDF LAYOUT
</div>
    @if(!empty($logoBase64))
    <img
        src="{{ $logoBase64 }}"
        alt="Logo"
        class="logo">
@endif

<div class="header">

  <div style="margin-bottom:20px;">
@php
    $societe = \App\Models\Societe::first();
    @php

$testStorage = storage_path(
    'app/public/' . ($societe->logo ?? '')
);

$testPublic = public_path(
    'storage/' . ($societe->logo ?? '')
);

@endphp

<div style="font-size:14px;color:red;">
    TEST STORAGE :
    {{ file_exists($testStorage) ? 'OUI' : 'NON' }}
</div>

<div style="font-size:14px;color:red;">
    TEST PUBLIC :
    {{ file_exists($testPublic) ? 'OUI' : 'NON' }}
</div>

    $test1 = storage_path('app/public/' . $societe->logo);
    $test2 = public_path('storage/' . $societe->logo);
@endphp

<div>
    TEST STORAGE :
    {{ file_exists($test1) ? 'OUI' : 'NON' }}
</div>

<div>
    TEST PUBLIC :
    {{ file_exists($test2) ? 'OUI' : 'NON' }}
</div>


</div>

    <div class="societe">

        <h2>
            {{ $societe->nom ?? 'BÂTIMENTS MATHE SEBASTIEN' }}
        </h2>

        @if(!empty($societe->adresse))
            <div>
                {{ $societe->adresse }}
            </div>
        @endif

        @if(!empty($societe->ville))
            <div>
                {{ $societe->ville }}
            </div>
        @endif

        @if(!empty($societe->telephone))
            <div>
                Tél : {{ $societe->telephone }}
            </div>
        @endif

        @if(!empty($societe->email))
            <div>
                {{ $societe->email }}
            </div>
        @endif

    </div>

</div>

<hr>

@yield('content')

<div class="footer">

    <hr>

    GESTIMMO‑PRO

    <br>

    Document généré automatiquement

    <br>

    {{ now()->format('d/m/Y H:i') }}

</div>

</body>
</html>