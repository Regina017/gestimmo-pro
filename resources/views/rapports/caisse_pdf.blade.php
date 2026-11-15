<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rapport de caisse</title>
</head>
<body>

<h1>Rapport de caisse</h1>

<table border="1" width="100%" cellpadding="10">

    <tr>
        <th>Total paiements</th>
        <td>{{ $totalPaiements }}</td>
    </tr>

    <tr>
        <th>Total dépenses</th>
        <td>{{ $totalDepenses }}</td>
    </tr>

    <tr>
        <th>Solde</th>
        <td>{{ $solde }}</td>
    </tr>

</table>

</body>
</html>