@extends('layouts.admin')

@section('title', 'Edit Ordinance')

@section('content')
    <h2>Edit Ordinance No. {{ $ordinance->ordinance_number }}</h2>

    <form action="{{ route('admin.ordinances.update', $ordinance) }}" method="POST">
        @csrf
        @method('PUT')

        @include('admin.ordinances._form')

        <button type="submit">Update</button>
        <a href="{{ route('admin.ordinances.show', $ordinance) }}">Cancel</a>
    </form>
@endsection
