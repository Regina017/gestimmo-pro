<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rapport des paiements</title>
</head>
<body>

<h1>Rapport des paiements</h1>

<table border="1" width="100%" cellpadding="5">

    <tr>
        <th>Date</th>
        <th>Montant</th>
        <th>Reste</th>
    </tr>

    @foreach($paiements as $paiement)

    <tr>
        <td>{{ $paiement->date_paiement }}</td>
        <td>{{ $paiement->montant }}</td>
        <td>{{ $paiement->reste }}</td>
    </tr>

    @endforeach

</table>

</body>
</html>