@extends('layouts.sidebar')

@section('content')
<div class="container-fluid py-4">
    <h1 class="mb-4">Welcome to Data Hewan</h1>
    <div class="card border-1 shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h5 class="card-title mb-0">Hewan List</h5>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Warna Tanda</th>
                            <th>Jenis Kelamin</th>
                            <th>Pemilik</th>
                            <th>Ras</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($result as $row)
                            <tr>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->tanggal_lahir }}</td>
                                <td>{{ $row->warna_tanda }}</td>
                                <td>{{ $row->jenis_kelamin }}</td>
                                <td>{{ $row->pemilik->user->nama }}</td>
                                <td>{{ $row->rashewan->nama_ras }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <style>
        .table th {
            font-weight: 600;
            font-size: 0.875rem;
        }

        .table td {
            vertical-align: middle;
        }
    </style>
@endpush