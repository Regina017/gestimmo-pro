<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <title>Rapport Contrats</title>

    <style>

        body{
            font-family: DejaVu Sans;
            font-size:12px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }

        th, td{
            border:1px solid #ddd;
            padding:8px;
        }

        th{
            background:#f2f2f2;
        }

        h1{
            text-align:center;
        }

    </style>

</head>

<body>

<h1>Rapport des contrats</h1>

<table>

    <thead>

        <tr>

            <th>ID</th>
            <th>Locataire</th>
            <th>Logement</th>
            <th>Loyer</th>
            <th>Statut</th>

        </tr>

    </thead>

    <tbody>

        @foreach($contrats as $contrat)

            <tr>

                <td>{{ $contrat->id }}</td>

                <td>
                    {{ $contrat->locataire->nom ?? '' }}
                    {{ $contrat->locataire->prenom ?? '' }}
                </td>

                <td>
                    {{ $contrat->logement->numero ?? '' }}
                </td>

                <td>
                    {{ number_format($contrat->loyer, 2, ',', ' ') }} $
                </td>

                <td>
                    {{ $contrat->statut }}
                </td>

            </tr>

        @endforeach

    </tbody>

</table>

</body>

</html>