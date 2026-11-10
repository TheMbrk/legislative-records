@extends('layouts.admin')

@section('title', 'Edit Resolution')

@section('content')
    <h2>Edit Resolution No. {{ $resolution->resolution_number }}</h2>

    <form action="{{ route('admin.resolutions.update', $resolution) }}" method="POST">
        @csrf
        @method('PUT')

        @include('admin.resolutions._form')

        <button type="submit">Update</button>
        <a href="{{ route('admin.resolutions.show', $resolution) }}">Cancel</a>
    </form>
@endsection
