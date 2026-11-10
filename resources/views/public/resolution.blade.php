@extends('layouts.public')

@section('title', 'Resolution No. ' . $resolution->resolution_number)

@section('content')
    <h2>Resolution No. {{ $resolution->resolution_number }}</h2>

    <table class="detail-table">
        <tr>
            <th align="left">Type</th>
            <td><strong>Resolution</strong></td>
        </tr>
        <tr>
            <th align="left">Resolution Number</th>
            <td>{{ $resolution->resolution_number }}</td>
        </tr>
        <tr>
            <th align="left">Title</th>
            <td>{{ $resolution->title }}</td>
        </tr>
        <tr>
            <th align="left">Date Passed</th>
            <td>{{ $resolution->date_passed->format('F d, Y') }}</td>
        </tr>
        <tr>
            <th align="left">Author/Sponsor</th>
            <td>{{ $resolution->author }}</td>
        </tr>
        <tr>
            <th align="left">Description</th>
            <td>{{ $resolution->description ?: '-' }}</td>
        </tr>
    </table>

    <p><a href="{{ url()->previous() == url()->current() ? route('search') : url()->previous() }}">Back to search</a></p>
@endsection
