@extends('layouts.admin')

@section('title', 'Resolution No. ' . $resolution->resolution_number)

@section('content')
    <h2>Resolution No. {{ $resolution->resolution_number }}</h2>

    <table class="detail-table">
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
        <tr>
            <th align="left">Last Updated</th>
            <td>{{ $resolution->updated_at->format('F d, Y h:i A') }}</td>
        </tr>
    </table>

    <form action="{{ route('admin.resolutions.destroy', $resolution) }}" method="POST"
          onsubmit="return confirm('Are you sure you want to delete this resolution?')">
        @csrf
        @method('DELETE')
        <p>
            <a href="{{ route('admin.resolutions.index') }}">Back to list</a> |
            <a href="{{ route('admin.resolutions.edit', $resolution) }}">Edit</a> |
            <button type="submit">Delete</button>
        </p>
    </form>
@endsection
