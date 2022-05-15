@extends('layouts.app')
@section('content')

<style>
    table {
        cursor: pointer;
    }
</style>
<div>
    <h2>Home</h2>

    @if (isset($lucky))
        <div class="alert alert-success" style="font-size: 1.5em">
            {!! $lucky !!}
        </div>
    @endif

    <table class="table table-bordered table-hover table-strip">
        <tr>
            <th>No</th>
            <th>Lucky User</th>
            <th>Word</th>
            <th>DateTime</th>
        </tr>
        @for ($i = 0; $i < count($words); $i++)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $words[$i]->word }}</td>
                <td>{{ $words[$i]->user->email  }}</td>
                <td>{{ $words[$i]->updated_at }}</td>
            </tr>
        @endfor
    </table>
</div>

@include("layouts.assets")

@endsection
