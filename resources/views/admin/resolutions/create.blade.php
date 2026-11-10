@extends('layouts.admin')

@section('title', 'Add Resolution')

@section('content')
    <h2>Add Resolution</h2>

    <form action="{{ route('admin.resolutions.store') }}" method="POST">
        @csrf

        @include('admin.resolutions._form')

        <button type="submit">Save</button>
        <a href="{{ route('admin.resolutions.index') }}">Cancel</a>
    </form>
@endsection
