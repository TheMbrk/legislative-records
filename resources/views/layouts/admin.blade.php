<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') - Admin - Provincial Legislative Records</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; }
        .header { background: #2b2b2b; color: white; padding: 12px 20px; }
        .header strong { font-size: 16px; }
        .header a, .header button { color: white; margin-right: 15px; background: none; border: none; font-size: 15px; cursor: pointer; text-decoration: underline; font-family: inherit; }
        .header form { display: inline; }
        .content { padding: 20px; }
        table { border-collapse: collapse; width: 100%; }
        table.detail-table { width: auto; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #eee; }
    </style>
</head>
<body>
    <div class="header">
        <strong>Legislative Records (ADMIN)</strong> &nbsp;&nbsp;
        <a href="{{ route('admin.ordinances.index') }}">Ordinances</a>
        <a href="{{ route('admin.resolutions.index') }}">Resolutions</a>
        <a href="{{ route('search') }}">Public Search</a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout ({{ auth()->user()->name }})</button>
        </form>
    </div>

    <div class="content">
        @if (session('success'))
            <p style="color: green"><strong>{{ session('success') }}</strong></p>
        @endif

        @if ($errors->any())
            <div style="color: red">
                <p><strong>Please fix the following:</strong></p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
