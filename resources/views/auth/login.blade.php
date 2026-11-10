@extends('layouts.public')

@section('title', 'Admin Login')

@section('content')
    <h2>Admin Login</h2>

    @if ($errors->any())
        <p><strong>{{ $errors->first() }}</strong></p>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <p>
            <label for="email">Email</label><br>
            <input type="email" name="email" id="email" value="{{ old('email') }}" autofocus>
        </p>

        <p>
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password">
        </p>

        <button type="submit">Login</button>
    </form>
@endsection
