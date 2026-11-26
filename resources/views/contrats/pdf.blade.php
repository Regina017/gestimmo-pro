<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Contrat N° {{ $contrat->id }}</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
            margin: 30px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            width: 140px;
            height: auto;
            margin-bottom: 15px;
        }

        h1 {
            text-align: center;
            color: #0d6efd;
            margin-top: 20px;
            margin-bottom: 25px;
        }

        h2 {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            width: 35%;
            background: #f2f2f2;
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        .footer {
            margin-top: 50px;
        }

        .signature {
            width: 100%;
            margin-top: 60px;
        }

        .signature td {
            border: none;
            text-align: center;
            width: 50%;
        }
    </style>
</head>

<body>

    @php
        $societe = \App\Models\Societe::first();
    @endphp

    <div class="header">

        @if($logoBase64)
            <img
                src="{{ $logoBase64 }}"
                alt="Logo Société"
                class="logo">
        @endif

        <h2>
            {{ $societe->nom ?? 'BÂTIMENTS MATHE SEBASTIEN' }}
        </h2>

        @if(!empty($societe?->adresse))
            <div>{{ $societe->adresse }}</div>
        @endif

        @if(!empty($societe?->ville))
            <div>{{ $societe->ville }}</div>
        @endif

        @if(!empty($societe?->telephone))
            <div>{{ $societe->telephone }}</div>
        @endif

        @if(!empty($societe?->email))
            <div>{{ $societe->email }}</div>
        @endif

    </div>

    <hr>

    <h1>
        CONTRAT DE LOCATION
    </h1>

    <table>

        <tr>
            <th>Numéro de contrat</th>
            <td>{{ $contrat->id }}</td>
        </tr>

        <tr>
            <th>Locataire</th>
            <td>
                {{ $contrat->locataire->nom ?? '' }}
                {{ $contrat->locataire->prenom ?? '' }}
            </td>
        </tr>

        <tr>
            <th>Logement</th>
            <td>
                {{ $contrat->logement->numero ?? '' }}
            </td>
        </tr>

        <tr>
            <th>Date début</th>
            <td>
                {{ \Carbon\Carbon::parse($contrat->date_debut)->format('d/m/Y') }}
            </td>
        </tr>

        <tr>
            <th>Date fin</th>
            <td>
                {{ \Carbon\Carbon::parse($contrat->date_fin)->format('d/m/Y') }}
            </td>
        </tr>

        <tr>
            <th>Loyer</th>
            <td>
                {{ number_format($contrat->loyer, 2, ',', ' ') }} $
            </td>
        </tr>

        <tr>
            <th>Caution</th>
            <td>
                {{ number_format($contrat->caution, 2, ',', ' ') }} $
            </td>
        </tr>

        <tr>
            <th>Statut</th>
            <td>
                {{ $contrat->statut }}
            </td>
        </tr>

    </table>

    <div class="footer">

        <p>
            Le présent contrat est établi entre le bailleur et le locataire conformément aux dispositions légales applicables.
        </p>

        <table class="signature">
            <tr>

                <td>
                    <strong>Bailleur</strong>
                    <br><br><br><br>
                    ______________________
                </td>

                <td>
                    <strong>Locataire</strong>
                    <br><br><br><br>
                    ______________________
                </td>

            </tr>
        </table>

    </div>

</body>
</html>