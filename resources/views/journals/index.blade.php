@extends('layouts.app')

@section('content')

<h1>Journal des actions</h1>

<table class="table table-bordered">

    <thead>

        <tr>

            <th>Date</th>

            <th>Utilisateur</th>

            <th>Action</th>

        </tr>

    </thead>

    <tbody>

    @foreach($journals as $journal)

        <tr>

            <td>
                {{ $journal->created_at }}
            </td>

            <td>
                {{ $journal->utilisateur }}
            </td>

            <td>
                {{ $journal->action }}
            </td>

        </tr>

    @endforeach

    </tbody>

</table>

@endsection