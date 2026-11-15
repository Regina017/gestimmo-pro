@extends('layouts.app')

@section('content')

<h1>Caisse</h1>

<div class="card mb-3">
    <div class="card-body">
        <h4>Total paiements</h4>
        <h2>{{ $totalPaiements }}</h2>
    </div>
</div>

<div class="card mb-3">
    <div class="card-body">
        <h4>Total dépenses</h4>
        <h2>{{ $totalDepenses }}</h2>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h4>Solde</h4>
        <h2>{{ $solde }}</h2>
    </div>
</div>

@endsection