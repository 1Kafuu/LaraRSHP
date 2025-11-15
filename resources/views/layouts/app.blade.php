<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('image/logo unair.png') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @yield('styles')
    <title>@yield('title')</title>
</head>

<body>

    <!-- HEADER -->
    <header>
        <div class="logo">
            <img src="{{ asset('image/logo unair.png') }}" alt="logo-rshp">
            <h1>UNAIR</h1>
        </div>

        <nav>
            <a href="{{route('index')}}">Home</a>
            <a href="{{route('organisasi')}}">Struktur Organisasi</a>
            <a href="{{route('layanan')}}">Layanan Umum</a>
            <a href="{{route('visi')}}">Visi Misi dan Tujuan</a>
            <a class="btn login" href="{{ route('login') }}">Login</a>
        </nav>
    </header>

    <!-- HERO -->
    <div class="hero">
        <img src="{{ asset('image/UNIVERSITAS-AIRLANGGA-scaled.webp') }}" alt="logo-rshp">
    </div>

    <!-- CONTENT -->
    <div class="container">
        @yield('content')
    </div>

    <!-- FOOTER -->
    <footer>
        &copy; 2025 Rumah Sakit Hewan Pendidikan - Universitas Airlangga
    </footer>
</body>

</html>