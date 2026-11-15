<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rapport des occupations</title>
</head>
<body>

<h1>Rapport des occupations</h1>

<table border="1" width="100%" cellpadding="5">

    <tr>
        <th>Bien</th>
        <th>Locataire</th>
        <th>Date entrée</th>
        <th>Statut</th>
    </tr>

    @foreach($occupations as $occupation)

    <tr>
        <td>{{ $occupation->bien->reference }}</td>
        <td>{{ $occupation->locataire->nom }}</td>
        <td>{{ $occupation->date_entree }}</td>
        <td>{{ $occupation->statut }}</td>
    </tr>

    @endforeach

</table>

</body>
</html>