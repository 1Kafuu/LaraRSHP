@extends('layouts.sidebar')

@section('content')
    <div class="container-fluid py-4">
        <h1 class="mb-4">Welcome to Data Role User</h1>
        <div class="card border-1 shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h5 class="card-title mb-0">User Role List</h5>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Id User</th>
                                <th>Nama</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($result) > 0)
                                @foreach ($result as $user)
                                    <tr>
                                        <td class="fw-medium">{{ $user['iduser'] }}</td>
                                        <td>{{ $user['nama'] }}</td>
                                        <td>
                                            @if (count($user['roles']) > 0)
                                                <ul class="role-list mb-0 ps-3">
                                                    @foreach ($user['roles'] as $role)
                                                        <li class="{{ $role['status'] ? 'aktif' : 'nonaktif' }}">
                                                            {{ $role['nama_role'] }} ({{ $role['status'] ? 'Aktif' : 'Non-Aktif' }})
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <span class="text-muted">Tidak ada role</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
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

        .role-list {
            list-style: none;
            padding-left: 0;
            margin: 0;
        }

        .aktif {
            color: #fff;
            background-color: #28a745;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 0.875rem;
            display: inline-block;
            margin: 2px 0;
        }

        .nonaktif {
            color: #fff;
            background-color: #dc3545;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 0.875rem;
            display: inline-block;
            margin: 2px 0;
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