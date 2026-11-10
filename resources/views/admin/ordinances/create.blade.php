@extends('layouts.admin')

@section('title', 'Add Ordinance')

@section('content')
    <h2>Add Ordinance</h2>

    <form action="{{ route('admin.ordinances.store') }}" method="POST">
        @csrf

        @include('admin.ordinances._form')

        <button type="submit">Save</button>
        <a href="{{ route('admin.ordinances.index') }}">Cancel</a>
    </form>
@endsection
