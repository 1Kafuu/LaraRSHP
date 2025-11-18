@extends('layouts.content')

@push('page')
    '{{ $pageName ?? 'datarashewan' }}'
@endpush


@section('path', 'Data Ras Hewan')
@section('title', 'Data Ras Hewan')

@section('content')
    <div class="container-fluid py-4">
        <h1 class="mb-4 text-xl font-bold text-gray-800">Welcome to Data Ras Hewan</h1>

        <!-- Card Container -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <!-- Header -->
            <div class="flex justify-between items-center p-5 border-b border-gray-100">
                <h5 class="text-lg font-semibold text-gray-800 mb-0">Ras Hewan List</h5>
                <button onclick="addRasHewan()"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-full shadow-sm transition-colors flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add Ras Hewan
                </button>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full table-auto">
                    <!-- Table Head -->
                    <thead class="bg-gray-50 text-indigo-700 font-semibold text-xs uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-3 text-left">SL.</th>
                            <th class="px-6 py-3 text-left">Jenis Hewan</th>
                            <th class="px-6 py-3 text-left">Ras</th>
                            <th class="px-6 py-3 text-right pr-6">Action</th>
                        </tr>
                    </thead>

                    <!-- Table Body -->
                    <tbody class="divide-y divide-gray-100 text-sm">
                        @php
                            $counter = 1;
                        @endphp
                        
                        @forelse ($groupRas as $index => $row)
                            @php
                                $rasCount = count($row['ras_hewan']);
                                $rowSpan = max($rasCount, 1);
                            @endphp
                            
                            @if($rasCount > 0)
                                <!-- Kasus: Jenis hewan memiliki ras -->
                                <tr class="hover:bg-indigo-50/30 transition-colors duration-200 align-top">
                                    <!-- SL. (hanya di baris pertama per grup) -->
                                    <td class="px-6 py-4 text-gray-500 font-medium" rowspan="{{ $rowSpan }}">
                                        {{ str_pad($counter, 2, '0', STR_PAD_LEFT) }}
                                    </td>

                                    <!-- Jenis Hewan (hanya di baris pertama) -->
                                    <td class="px-6 py-4 font-medium text-gray-800" rowspan="{{ $rowSpan }}">
                                        {{ $row['nama_jenis_hewan'] }}
                                    </td>

                                    <!-- Ras (satu per baris) -->
                                    @foreach ($row['ras_hewan'] as $rasIndex => $ras)
                                        @if($rasIndex > 0)
                                            </tr>
                                            <tr class="hover:bg-indigo-50/30">
                                        @endif
                                        <td class="px-6 py-4">
                                            <span
                                                class="inline-block px-3 py-1 text-xs font-medium text-indigo-700 bg-indigo-100 rounded-full">
                                                {{ $ras['nama_ras'] }}
                                            </span>
                                        </td>

                                        <!-- Action Buttons (per ras) -->
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex justify-end items-center gap-1">
                                                <!-- Edit Button -->
                                                <button type="button" onclick="editRasHewan({{ $ras['idras_hewan'] }})"
                                                    class="w-8 h-8 rounded-full border border-indigo-600 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-all duration-200 flex items-center justify-center"
                                                    title="Edit Ras">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                        </path>
                                                    </svg>
                                                </button>

                                                <!-- Delete Button -->
                                                <button type="button" onclick="deleteRasHewan({{ $ras['idras_hewan'] }})"
                                                    class="w-8 h-8 rounded-full border border-red-600 text-red-600 hover:bg-red-600 hover:text-white transition-all duration-200 flex items-center justify-center"
                                                    title="Delete Ras">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>
                            @else
                                <!-- Kasus: Jenis hewan TIDAK memiliki ras -->
                                <tr class="hover:bg-indigo-50/30 transition-colors duration-200">
                                    <!-- SL. -->
                                    <td class="px-6 py-4 text-gray-500 font-medium">
                                        {{ str_pad($counter, 2, '0', STR_PAD_LEFT) }}
                                    </td>

                                    <!-- Jenis Hewan -->
                                    <td class="px-6 py-4 font-medium text-gray-800">
                                        {{ $row['nama_jenis_hewan'] }}
                                    </td>

                                    <!-- Ras (kosong) -->
                                    <td class="px-6 py-4">
                                        <span class="inline-block px-3 py-1 text-xs font-medium text-gray-500 bg-gray-100 rounded-full italic">
                                            Tidak ada ras
                                        </span>
                                    </td>   
                                </tr>
                            @endif
                            
                            @php
                                $counter++;
                            @endphp
                            
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center text-gray-500 text-base">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                            </path>
                                        </svg>
                                        <p class="font-medium">Tidak ada data ras hewan.</p>
                                        <p class="text-sm text-gray-400 mt-1">Klik "Add Ras Hewan" untuk menambahkan data baru.
                                        </p>
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