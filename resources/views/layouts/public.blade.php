<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Legislative Search') - Provincial Legislative Records</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; }
        .header { background: #1a5fb4; color: white; padding: 12px 20px; }
        .header strong { font-size: 16px; }
        .header a { color: white; margin-left: 15px; }
        .content { padding: 20px; }
        table { border-collapse: collapse; width: 100%; }
        table.detail-table { width: auto; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #eee; }
    </style>
</head>
<body>
    <div class="header">
        <strong>Provincial Legislative Records</strong>
        <a href="{{ route('search') }}">Search</a>
        @auth
            <a href="{{ route('admin.ordinances.index') }}">Admin Panel</a>
        @else
            <a href="{{ route('login') }}">Admin Login</a>
        @endauth
    </div>

    <div class="content">
        @yield('content')
    </div>
</body>
</html>
