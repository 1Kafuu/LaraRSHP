@extends('layouts.app')

@section('title', 'Struktur Organisasi')
    <!-- CONTENT -->
    @section('content')
        <h1>Struktur Organisasi</h1>
        <p>Berikut adalah struktur organisasi Rumah Sakit Hewan Pendidikan Universitas Airlangga.</p>

        <div class="org-chart">

            <!-- Level 1: Direktur -->
            <div class="level">
                <div class="person">
                    <img src="{{ asset('image/direktur.png') }}" alt="Direktur">
                    <h3>Dr, Ira Sari Yudaniayanti, M.P., drh.</h3>
                    <p>Direktur</p>
                </div>
            </div>
            <div class="line"></div>

            <!-- Level 2: Wakil Direktur -->
            <div class="level">
                <div class="person">
                    <img src="{{ asset('image/wakdirek1.png') }}" alt="Wakil Direktur 1">
                    <h3>Dr. Nusdianto Triakoso, M.P., drh.</h3>
                    <p>Wakil Direktur Bidang Pelayanan</p>
                </div>
                <div class="person">
                    <img src="{{ asset('image/wakdirek2.png') }}" alt="Wakil Direktur 2">
                    <h3>Dr. Miyayu Soneta S., M.Vet., drh</h3>
                    <p>Wakil Direktur Bidang Akademik</p>
                </div>
            </div>
        </div>
    @endsection