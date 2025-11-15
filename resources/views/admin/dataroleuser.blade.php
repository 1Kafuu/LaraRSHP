@extends('layouts.content')

@push('page')
'{{ $pageName ?? 'dataroleuser' }}'
@endpush

@section('path', 'Data Role User')

@section('title', 'Data Role User')

@section('content')
    <div class="container-fluid py-4">
        <h1 class="mb-4 text-xl font-bold text-gray-800">Welcome to Data Role User</h1>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <!-- Header -->
            <div class="flex justify-between items-center p-5 border-b border-gray-100">
                <h5 class="text-lg font-semibold text-gray-800 mb-0">User Role List</h5>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full table-auto">
                    <thead class="bg-gray-50 text-indigo-700 font-semibold text-xs uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-3 text-left">SL.</th>
                            <th class="px-6 py-3 text-left">Id User</th>
                            <th class="px-6 py-3 text-left">Nama</th>
                            <th class="px-6 py-3 text-left">Role</th>
                            <th class="px-6 py-3 text-right pr-6">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                        @if(count($result) > 0)
                            @foreach ($result as $user)
                                <tr class="hover:bg-indigo-50/30 transition-colors">
                                    <!-- SL. -->
                                    <td class="px-6 py-4 text-gray-500 font-medium">
                                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                    </td>
                                    
                                    <!-- Id User -->
                                    <td class="px-6 py-4 text-gray-500 font-medium">
                                        {{ $user['iduser'] }}
                                    </td>
                                    
                                    <!-- Nama -->
                                    <td class="px-6 py-4 font-medium text-gray-800">
                                        {{ $user['nama'] }}
                                    </td>
                                    
                                    <!-- Role -->
                                    <td class="px-6 py-4 text-gray-600">
                                        @if (count($user['roles']) > 0)
                                            <ul class="role-list mb-0 ps-3 space-y-1">
                                                @foreach ($user['roles'] as $role)
                                                    <li class="text-sm {{ $role['status'] ? 'text-green-700 font-medium' : 'text-gray-600' }}">
                                                        {{ $role['nama_role'] }}
                                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                                                            {{ $role['status'] 
                                                                ? 'bg-green-100 text-green-800 border border-green-300' 
                                                                : 'bg-gray-100 text-gray-800 border border-gray-300' 
                                                            }}">
                                                            {{ $role['status'] ? 'Aktif' : 'Non-Aktif' }}
                                                        </span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <span class="text-gray-400">Tidak ada role</span>
                                        @endif
                                    </td>
                                    
                                    <!-- Action Buttons -->
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex justify-end gap-1">
                                            <!-- Edit Button -->
                                            <button 
                                                class="w-8 h-8 rounded-full border border-indigo-600 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-colors flex items-center justify-center" 
                                                title="Edit"
                                                onclick="editUser({{ $user['iduser'] }})">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </button>
                                            
                                            <!-- Delete Button -->
                                            <button 
                                                class="w-8 h-8 rounded-full border border-red-600 text-red-600 hover:bg-red-600 hover:text-white transition-colors flex items-center justify-center" 
                                                title="Delete"
                                                onclick="deleteUser({{ $user['iduser'] }})">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                    Tidak ada data pengguna.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection