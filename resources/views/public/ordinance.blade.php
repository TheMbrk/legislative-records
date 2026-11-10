@extends('layouts.public')

@section('title', 'Ordinance No. ' . $ordinance->ordinance_number)

@section('content')
    <h2>Ordinance No. {{ $ordinance->ordinance_number }}</h2>

    <table class="detail-table">
        <tr>
            <th align="left">Type</th>
            <td><strong>Ordinance</strong></td>
        </tr>
        <tr>
            <th align="left">Ordinance Number</th>
            <td>{{ $ordinance->ordinance_number }}</td>
        </tr>
        <tr>
            <th align="left">Title</th>
            <td>{{ $ordinance->title }}</td>
        </tr>
        <tr>
            <th align="left">Date Passed</th>
            <td>{{ $ordinance->date_passed->format('F d, Y') }}</td>
        </tr>
        <tr>
            <th align="left">Author/Sponsor</th>
            <td>{{ $ordinance->author }}</td>
        </tr>
        <tr>
            <th align="left">Description</th>
            <td>{{ $ordinance->description ?: '-' }}</td>
        </tr>
    </table>

    <p><a href="{{ url()->previous() == url()->current() ? route('search') : url()->previous() }}">Back to search</a></p>
@endsection
