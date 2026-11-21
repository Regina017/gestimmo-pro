<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Rapport des locataires</title>

<style>
body{font-family:DejaVu Sans;}
table{width:100%;border-collapse:collapse;}
th,td{border:1px solid #ddd;padding:8px;}
th{background:#f2f2f2;}
.header{text-align:center;}
</style>

</head>
<body>

@php
$societe = \App\Models\Societe::first();
@endphp

<div class="header">

@if($societe && $societe->logo)
<img src="{{ public_path('storage/'.$societe->logo) }}" width="90">
@endif

<h2>{{ $societe->nom }}</h2>

</div>

<hr>

<h2>Rapport des Locataires</h2>

<table>

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