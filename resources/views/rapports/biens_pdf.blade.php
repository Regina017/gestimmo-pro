<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rapport des biens</title>
</head>
<body>

<h1>Rapport des biens</h1>

<table border="1" width="100%" cellpadding="5">

    <tr>
        <th>Référence</th>
        <th>Type</th>
        <th>Adresse</th>
        <th>Loyer</th>
    </tr>

    @foreach($biens as $bien)

    <tr>
        <td>{{ $bien->reference }}</td>
        <td>{{ $bien->type }}</td>
        <td>{{ $bien->adresse }}</td>
        <td>{{ $bien->loyer }}</td>
    </tr>

    @endforeach

</table>

</body>
</html>