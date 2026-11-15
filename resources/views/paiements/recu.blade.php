<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <title>Reçu</title>

    <style>

        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            border: 1px solid #ccc;
            padding: 10px;
        }

    </style>

</head>

<body>

<h1>REÇU DE PAIEMENT</h1>

<p>
    N° REC-{{ str_pad($paiement->id, 6, '0', STR_PAD_LEFT) }}
</p>

<table>

    <tr>
        <td>Locataire</td>
        <td>{{ $occupation->locataire->nom ?? '' }}</td>
    </tr>

    <tr>
        <td>Bien</td>
        <td>{{ $occupation->bien->reference ?? '' }}</td>
    </tr>

    <tr>
        <td>Date</td>
        <td>{{ $paiement->date_paiement }}</td>
    </tr>

    <tr>
        <td>Montant</td>
        <td>{{ number_format($paiement->montant, 2) }} $</td>
    </tr>

</table>

<br><br>

Signature : __________________________

</body>

</html>