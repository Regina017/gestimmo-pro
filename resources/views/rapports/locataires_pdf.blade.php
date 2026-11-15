<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rapport des locataires</title>
</head>
<body>

<h1>Rapport des locataires</h1>

<table border="1" width="100%" cellpadding="5">

    <tr>
        <th>Nom</th>
        <th>Téléphone</th>
        <th>Email</th>
    </tr>

    @foreach($locataires as $locataire)

    <tr>
        <td>{{ $locataire->nom }}</td>
        <td>{{ $locataire->telephone }}</td>
        <td>{{ $locataire->email }}</td>
    </tr>

    @endforeach

</table>

</body>
</html>