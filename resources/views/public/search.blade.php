@extends('layouts.public')

@section('title', 'Legislative Search')

@section('content')
    <h2>Search Ordinances and Resolutions</h2>

    <form action="{{ route('search') }}" method="GET">
        <p>
            <label for="keyword">Keyword in title</label>
            <input type="text" name="keyword" id="keyword" size="40" value="{{ $keyword }}" placeholder="e.g. agriculture">

            <label for="type">Type</label>
            <select name="type" id="type">
                <option value="all" {{ $type == 'all' ? 'selected' : '' }}>Ordinances and Resolutions</option>
                <option value="ordinance" {{ $type == 'ordinance' ? 'selected' : '' }}>Ordinances only</option>
                <option value="resolution" {{ $type == 'resolution' ? 'selected' : '' }}>Resolutions only</option>
            </select>

            <button type="submit">Search</button>
            <a href="{{ route('search') }}">Clear</a>
        </p>
    </form>

    @if ($keyword != '')
        <p>{{ $results->count() }} result(s) found for "<strong>{{ $keyword }}</strong>"</p>
    @else
        <p>Showing all records. Type a keyword above to search.</p>
    @endif

    @if ($results->isEmpty())
        <p>No records found.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Number</th>
                    <th>Title</th>
                    <th>Date Passed</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $result)
                    <tr>
                        <td><strong>{{ $result['type'] }}</strong></td>
                        <td>{{ $result['number'] }}</td>
                        <td>{{ $result['title'] }}</td>
                        <td>{{ $result['date_passed']->format('M d, Y') }}</td>
                        <td><a href="{{ $result['url'] }}">View</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
