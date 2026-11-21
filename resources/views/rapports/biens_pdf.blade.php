<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Rapport des biens</title>

<style>
body{font-family:DejaVu Sans,sans-serif;font-size:12px;}
table{width:100%;border-collapse:collapse;margin-top:20px;}
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
<p>{{ $societe->adresse }}</p>

</div>

<hr>

<h2>Rapport des Biens</h2>

<table>

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
<td>{{ number_format($bien->loyer,2) }} $</td>
</tr>
@endforeach

</table>

</body>
</html>