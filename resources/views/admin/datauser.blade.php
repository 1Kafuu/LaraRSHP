@extends('layouts.sidebar')

@section('content')
    <div class="container-fluid py-4">
        <h1 class="mb-4">Welcome to Data User</h1>
        <div class="card border-1 shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h5 class="card-title mb-0">User List</h5>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Id User</th>
                                <th>Nama</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($result as $row)
                                <tr>
                                    <td class="fw-medium">{{ $row->iduser }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td class="text-muted">{{ $row->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .table th {
            font-weight: 600;
            font-size: 0.875rem;
        }

        .table td {
            vertical-align: middle;
        }

        .nav-link {
            transition: all 0.3s ease;
            font-weight: normal;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            font-weight: bold;
        }

        .nav-link.active {
            font-weight: bold;
            background-color: rgba(255, 255, 255, 0.2);
        }
    </style>
@endsection