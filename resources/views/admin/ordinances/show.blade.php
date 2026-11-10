@extends('layouts.admin')

@section('title', 'Ordinance No. ' . $ordinance->ordinance_number)

@section('content')
    <h2>Ordinance No. {{ $ordinance->ordinance_number }}</h2>

    <table class="detail-table">
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
        <tr>
            <th align="left">Last Updated</th>
            <td>{{ $ordinance->updated_at->format('F d, Y h:i A') }}</td>
        </tr>
    </table>

    <form action="{{ route('admin.ordinances.destroy', $ordinance) }}" method="POST"
          onsubmit="return confirm('Are you sure you want to delete this ordinance?')">
        @csrf
        @method('DELETE')
        <p>
            <a href="{{ route('admin.ordinances.index') }}">Back to list</a> |
            <a href="{{ route('admin.ordinances.edit', $ordinance) }}">Edit</a> |
            <button type="submit">Delete</button>
        </p>
    </form>
@endsection
