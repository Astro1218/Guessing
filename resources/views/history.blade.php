@extends('layouts.app')
@section('content')

<style>
    table {
        cursor: pointer;
    }
</style>
<div>
    <h2>Guess History</h2>
    <table class="table table-bordered table-hover table-strip">
        <tr>
            <th>No</th>
            <th>Word</th>
            <th>State</th>
            <th>Date</th>
        </tr>
        @for ($i = 0; $i < count($histories); $i++)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $histories[$i]->word }}</td>
                <td>{!! $histories[$i]->state ? "<span class='badge badge-success' style='padding: 8px;'>Success</span>" : "<span class='badge badge-danger' style='padding: 8px;'>Failed</span>" !!}</td>
                <td>{{ $histories[$i]->created_at }}</td>
            </tr>
        @endfor
    </table>
</div>

@include("layouts.assets")

@endsection
