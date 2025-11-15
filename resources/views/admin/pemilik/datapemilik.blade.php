@extends('layouts.content')

@push('page')
'{{ $pageName ?? 'datapemilik' }}'
@endpush

@section('path', 'Data Pemilik')
@section('title', 'Data Pemilik')

@section('content')
    <div class="container-fluid py-4">
        <h1 class="mb-4 text-xl font-bold text-gray-800">Welcome to Data Pemilik</h1>

        <!-- Card Container -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <!-- Header -->
            <div class="flex justify-between items-center p-5 border-b border-gray-100">
                <h5 class="text-lg font-semibold text-gray-800 mb-0">Pemilik List</h5>
                <button class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-full shadow-sm transition-colors flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add Pemilik
                </button>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full table-auto">
                    <!-- Table Head -->
                    <thead class="bg-gray-50 text-indigo-700 font-semibold text-xs uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-3 text-left">SL.</th>
                            <th class="px-6 py-3 text-left">Nama</th>
                            <th class="px-6 py-3 text-left">Email</th>
                            <th class="px-6 py-3 text-left">No. Telepon</th>
                            <th class="px-6 py-3 text-left">Alamat</th>
                            <th class="px-6 py-3 text-right pr-6">Action</th>
                        </tr>
                    </thead>

                    <!-- Table Body -->
                    <tbody class="divide-y divide-gray-100 text-sm">
                        @forelse ($result as $row)
                            <tr class="hover:bg-indigo-50/30 transition-colors duration-200">
                                <!-- SL. -->
                                <td class="px-6 py-4 text-gray-500 font-medium">
                                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                </td>

                                <!-- Nama -->
                                <td class="px-6 py-4 font-medium text-gray-800">
                                    {{ $row->user->nama ?? 'Tidak Ada' }}
                                </td>

                                <!-- Email -->
                                <td class="px-6 py-4 text-gray-600">
                                    <a href="mailto:{{ $row->user->email }}" class="text-indigo-600 hover:underline">
                                        {{ $row->user->email ?? '-' }}
                                    </a>
                                </td>

                                <!-- No. Telepon -->
                                <td class="px-6 py-4 text-gray-600">
                                    @if($row->no_wa)
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $row->no_wa) }}" 
                                           target="_blank" 
                                           class="text-green-600 hover:underline flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.297-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.626.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.263c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.907L.000 24l6.304-1.654c1.664.967 3.604 1.481 5.586 1.481 6.554 0 11.89-5.335 11.892-11.893C23.858 7.097 19.583 2.763 12.27 2.761"></path>
                                            </svg>
                                            {{ $row->no_wa }}
                                        </a>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>

                                <!-- Alamat -->
                                <td class="px-6 py-4 text-gray-600 max-w-xs truncate" title="{{ $row->alamat }}">
                                    {{ $row->alamat ? \Illuminate\Support\Str::limit($row->alamat, 50) : '-' }}
                                </td>

                                <!-- Action Buttons -->
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end items-center gap-1">
                                        <!-- Edit Button -->
                                        <button
                                            type="button"
                                            {{-- onclick="editPemilik({{ $row->idpemilik }})" --}}
                                            class="w-8 h-8 rounded-full border border-indigo-600 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-all duration-200 flex items-center justify-center"
                                            title="Edit Pemilik">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                        </button>

                                        <!-- Delete Button -->
                                        <button
                                            type="button"
                                            {{-- onclick="deletePemilik({{ $row->idpemilik }})" --}}
                                            class="w-8 h-8 rounded-full border border-red-600 text-red-600 hover:bg-red-600 hover:text-white transition-all duration-200 flex items-center justify-center"
                                            title="Delete Pemilik">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-gray-500 text-base">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                        </svg>
                                        <p class="font-medium">Tidak ada data pemilik.</p>
                                        <p class="text-sm text-gray-400 mt-1">Klik "Add Pemilik" untuk menambahkan data baru.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection