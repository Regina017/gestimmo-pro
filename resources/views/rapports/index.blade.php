@extends('layouts.app')

@section('content')

<h1>Rapports</h1>

<div class="mb-3">

    <a href="{{ route('rapports.biens.excel') }}"
       class="btn btn-success mb-2">
        📊 Biens Excel
    </a>

    <a href="{{ route('rapports.locataires.excel') }}"
       class="btn btn-success mb-2">
        📊 Locataires Excel
    </a>

    <a href="{{ route('rapports.paiements.excel') }}"
       class="btn btn-success mb-2">
        📊 Paiements Excel
    </a>

    <a href="{{ route('rapports.depenses.excel') }}"
       class="btn btn-success mb-2">
        📊 Dépenses Excel
    </a>

</div>

<div class="list-group">

    <a href="{{ route('rapports.biens.pdf') }}"
       class="list-group-item list-group-item-action">
        📄 Rapport des biens
    </a>

    <a href="{{ route('rapports.locataires.pdf') }}"
       class="list-group-item list-group-item-action">
        📄 Rapport des locataires
    </a>

    <a href="{{ route('rapports.occupations.pdf') }}"
       class="list-group-item list-group-item-action">
        📄 Rapport des occupations
    </a>

    <a href="{{ route('rapports.paiements.pdf') }}"
       class="list-group-item list-group-item-action">
        📄 Rapport des paiements
    </a>

    <a href="{{ route('rapports.depenses.pdf') }}"
       class="list-group-item list-group-item-action">
        📄 Rapport des dépenses
    </a>

    <a href="{{ route('rapports.caisse.pdf') }}"
       class="list-group-item list-group-item-action">
        📄 Rapport de caisse
    </a>

</div>

@endsection