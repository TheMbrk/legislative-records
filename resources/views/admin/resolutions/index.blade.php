@extends('layouts.admin')

@section('title', 'Resolutions')

@section('content')
    <h2>Provincial Resolutions</h2>

    <p><a href="{{ route('admin.resolutions.create') }}">+ Add Resolution</a></p>

    <form action="{{ route('admin.resolutions.index') }}" method="GET">
        <p>
            <label for="resolution_number">Resolution Number</label>
            <input type="text" name="resolution_number" id="resolution_number" value="{{ request('resolution_number') }}">

            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ request('title') }}">

            <label for="date_passed">Date Passed</label>
            <input type="date" name="date_passed" id="date_passed" value="{{ request('date_passed') }}">

            <button type="submit">Search</button>
            <a href="{{ route('admin.resolutions.index') }}">Clear</a>
        </p>
    </form>

    @if ($resolutions->isEmpty())
        <p>No resolutions found.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Resolution No.</th>
                    <th>Title</th>
                    <th>Date Passed</th>
                    <th>Author/Sponsor</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resolutions as $resolution)
                    <tr>
                        <td>{{ $resolution->resolution_number }}</td>
                        <td>{{ $resolution->title }}</td>
                        <td>{{ $resolution->date_passed->format('M d, Y') }}</td>
                        <td>{{ $resolution->author }}</td>
                        <td>
                            <form action="{{ route('admin.resolutions.destroy', $resolution) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete Resolution No. {{ $resolution->resolution_number }}?')">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('admin.resolutions.show', $resolution) }}">View</a> |
                                <a href="{{ route('admin.resolutions.edit', $resolution) }}">Edit</a> |
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $resolutions->links('partials.pagination') }}
    @endif
@endsection
