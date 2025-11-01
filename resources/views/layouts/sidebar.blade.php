<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'App')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('styles')
    <style>
        html,
        body {
            overflow-x: hidden;
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            width: 250px;
            flex-shrink: 0;
        }

        .content {
            flex-grow: 1;
            overflow-y: auto;
            overflow-x: hidden;
            min-width: 0;
        }
    </style>
</head>

<body>
    <div class="d-flex h-100">
        @if(session('user.role') == 1)
            @include('components.sidebar')
        @elseif(session('user.role') == 4)
            @include('components.sidebar-resepsionis')
        @endif

        <div class="content p-4">
            @yield('content')
        </div>
    </div>
</body>

</html>