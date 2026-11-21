<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Rapport des Dépenses</title>

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

<h2>Rapport des Dépenses</h2>

<table>

<tr>
<th>Date</th>
<th>Libellé</th>
<th>Montant</th>
</tr>

@foreach($depenses as $depense)

<tr>
<td>{{ $depense->created_at }}</td>
<td>{{ $depense->libelle }}</td>
<td>{{ number_format($depense->montant,2) }} $</td>
</tr>

@endforeach

</table>

</body>
</html>