@extends('layouts.sidebar')

@section('content')
    <div class="container-fluid py-4">
        <h1 class="mb-4">Welcome to Data Ras Hewan</h1>
        <div class="card border-1 shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h5 class="card-title mb-0">Ras Hewan List</h5>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Jenis Hewan</th>
                                <th>Ras</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($groupRas as $row)
                                <tr>
                                    <td class="fw-medium">{{ $row['nama_jenis_hewan'] }}</td>
                                    <td>
                                        @foreach ($row['ras_hewan'] as $ras)
                                            <div>{{ $ras['nama_ras'] }}</div>
                                        @endforeach
                                    </td>
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

        .table td>div {
            margin-bottom: 0.25rem;
        }

        .table td>div:last-child {
            margin-bottom: 0;
        }
    </style>
@endpush