@extends('layouts.app')
@section('title', 'Rumah Sakit Hewan Pendidikan Universitas Airlangga')
    <!-- CONTENT -->
    @section('content')
        <section class="main">
            <div class="left-content">

                <button class="btn btn-yellow">PENDAFTARAN ONLINE</button>

                <p>
                    Rumah Sakit Hewan Pendidikan Universitas Airlangga berinovasi untuk selalu meningkatkan kualitas
                    pelayanan.
                    Fitur pendaftaran online mempermudah Anda untuk mendaftarkan hewan kesayangan tanpa harus antre
                    lama.
                </p>

                <button class="btn btn-blue">INFORMASI JADWAL DOKTER JAGA</button>
            </div>

            <div class="right-content">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/rCfvZPECZvE?si=oAqZzpBxd1qUY_ah"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </section>

        <!-- BERITA TERKINI -->
        <div class="news-section">
            <h2>Berita Terkini</h2>
            <div class="news-slider" id="slider">
                <div class="news-card">
                    <img src="{{ asset('image/news1.jpg') }}" alt="Berita 1">
                    <p>Trial Endolaparoskopi Persiapan Workshop di RSHP Unair</p>
                </div>
                <div class="news-card">
                    <img src="{{ asset('image/news2.jpeg') }}" alt="Berita 2">
                    <p>Seminar dan Workshop Disease Management and Diagnostic Technique in Rabbits</p>
                </div>
                <div class="news-card">
                    <img src="{{ asset('image/news3.jpg') }}" alt="Berita 3">
                    <p>Lebih dari 50 Persen Kasus Penyakit Pencernaan di RSHP Unair Resisten terhadap Antibiotika</p>
                </div>
                <div class="news-card">
                    <img src="{{ asset('image/news4.jpeg') }}" alt="Berita 4">
                    <p>Drh Igor, Klinik DPKH Kaltim Magang Praktik di RSHP</p>
                </div>
                <div class="news-card">
                    <img src="{{ asset('image/news5.jpeg') }}" alt="Berita 5">
                    <p>Vaksin Rabies dan Pameran Hewan.</p>
                </div>
            </div>
        </div>
    @endsection