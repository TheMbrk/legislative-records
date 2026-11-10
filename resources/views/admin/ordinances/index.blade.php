@extends('layouts.admin')

@section('title', 'Ordinances')

@section('content')
    <h2>Provincial Ordinances</h2>

    <p><a href="{{ route('admin.ordinances.create') }}">+ Add Ordinance</a></p>

    <form action="{{ route('admin.ordinances.index') }}" method="GET">
        <p>
            <label for="ordinance_number">Ordinance Number</label>
            <input type="text" name="ordinance_number" id="ordinance_number" value="{{ request('ordinance_number') }}">

            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ request('title') }}">

            <label for="date_passed">Date Passed</label>
            <input type="date" name="date_passed" id="date_passed" value="{{ request('date_passed') }}">

            <button type="submit">Search</button>
            <a href="{{ route('admin.ordinances.index') }}">Clear</a>
        </p>
    </form>

    @if ($ordinances->isEmpty())
        <p>No ordinances found.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Ordinance No.</th>
                    <th>Title</th>
                    <th>Date Passed</th>
                    <th>Author/Sponsor</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ordinances as $ordinance)
                    <tr>
                        <td>{{ $ordinance->ordinance_number }}</td>
                        <td>{{ $ordinance->title }}</td>
                        <td>{{ $ordinance->date_passed->format('M d, Y') }}</td>
                        <td>{{ $ordinance->author }}</td>
                        <td>
                            <form action="{{ route('admin.ordinances.destroy', $ordinance) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete Ordinance No. {{ $ordinance->ordinance_number }}?')">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('admin.ordinances.show', $ordinance) }}">View</a> |
                                <a href="{{ route('admin.ordinances.edit', $ordinance) }}">Edit</a> |
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $ordinances->links('partials.pagination') }}
    @endif
@endsection
