<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rapport des dépenses</title>
</head>
<body>

<h1>Rapport des dépenses</h1>

<table border="1" width="100%" cellpadding="5">

    <tr>
        <th>Date</th>
        <th>Catégorie</th>
        <th>Libellé</th>
        <th>Montant</th>
    </tr>

    @foreach($depenses as $depense)

    <tr>
        <td>{{ $depense->date_depense }}</td>
        <td>{{ $depense->categorie }}</td>
        <td>{{ $depense->libelle }}</td>
        <td>{{ $depense->montant }}</td>
    </tr>

    @endforeach

</table>

</body>
</html>