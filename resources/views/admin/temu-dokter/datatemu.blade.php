@extends('layouts.content')

@push('page')
    '{{ $pageName ?? 'datatemu' }}'
@endpush

@section('path', 'Data Temu Dokter')

@section('title', 'Data Temu Dokter')

@section('content')
    {{-- {{ dd($dokter) }} --}}
    <div class="container-fluid py-4">
        <h1 class="mb-4 text-xl font-bold text-gray-800">Welcome to Data Temu Dokter</h1>

        <!-- Card Container -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <!-- Header -->
            <div class="flex justify-between items-center p-5 border-b border-gray-100">
                <h5 class="text-lg font-semibold text-gray-800 mb-0">Temu Dokter List</h5>
                <div class="flex items-center gap-3">
                    <!-- Filter Buttons -->
                    <div class="flex bg-gray-100 rounded-lg p-1">
                        <a href="{{ route('datatemu', ['filter' => 'today']) }}"
                            class="px-4 py-2 text-sm font-medium rounded-md transition-all duration-200 {{ ($filter == 'today') ? 'bg-white text-gray-800 shadow-sm' : 'text-gray-600 hover:text-gray-800' }}">
                            Today
                        </a>
                        <a href="{{ route('datatemu', ['filter' => 'all']) }}"
                            class="px-4 py-2 text-sm font-medium rounded-md transition-all duration-200 {{ $filter == 'all' ? 'bg-white text-gray-800 shadow-sm' : 'text-gray-600 hover:text-gray-800' }}">
                            All
                        </a>
                    </div>

                    <!-- Add Button -->
                    <button command="show-modal" commandfor="create-temu"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-full shadow-sm transition-colors flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Add Temu Dokter
                    </button>
                </div>
            </div>

            @if(session('success') || session('error'))
                <div id="flash-message"
                    class="mb-6 mx-3 p-4 rounded-lg shadow-sm border {{ session('error') ? 'bg-red-50 border-red-200' : 'bg-green-50 border-green-200' }}">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            @if(session('error'))
                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                        clip-rule="evenodd" />
                                </svg>
                            @else
                                <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                            @endif
                        </div>
                        <div class="ml-3 flex-1">
                            <p class="text-sm font-medium {{ session('error') ? 'text-red-800' : 'text-green-800' }}">
                                {{ session('error') ?? session('success') }}
                            </p>
                        </div>
                        <button onclick="document.getElementById('flash-message').remove()"
                            class="ml-3 text-gray-400 hover:text-gray-600">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full table-auto">
                    <!-- Table Head -->
                    <thead class="bg-gray-50 text-indigo-700 font-semibold text-xs uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-3 text-left">No Urut</th>
                            <th class="px-6 py-3 text-left">Tanggal</th>
                            <th class="px-6 py-3 text-left">Pet</th>
                            <th class="px-6 py-3 text-left">Dokter</th>
                            <th class="px-6 py-3 text-left">Status</th>
                            <th class="px-6 py-3 text-right pr-6">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100 text-sm">
                        @forelse ($result as $row)
                            <tr class="hover:bg-indigo-50/30 transition-colors duration-200">

                                <!-- No Urut dengan indikator tanggal -->
                                <td class="px-6 py-4 font-medium text-gray-800">
                                    <div class="flex items-center gap-2">
                                        <span>{{ $row->no_urut }}</span>
                                        @if(\Carbon\Carbon::parse($row->waktu_daftar)->isToday())
                                            <span class="text-xs text-blue-600 bg-blue-100 px-2 py-1 rounded-full font-medium">
                                                Today
                                            </span>
                                        @endif
                                    </div>
                                </td>

                                <td class="px-6 py-4 font-medium text-gray-800">
                                    {{ $row->waktu_daftar }}
                                </td>

                                <td class="px-6 py-4 font-medium text-gray-800">
                                    {{ $row->nama_pet }}
                                </td>

                                <td class="px-6 py-4 font-medium text-gray-800">
                                    {{ $row->nama }}
                                </td>

                                <td class="px-6 py-4 font-medium text-gray-800">
                                    <div class="flex items-center">
                                        @php
                                            $status = trim(strtolower(htmlspecialchars($row->status)));
                                            $bgColor = $status === 'complete' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800';
                                            $borderColor = $status === 'complete' ? 'border-green-400' : 'border-yellow-400';
                                        @endphp

                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium border {{ $bgColor }} {{ $borderColor }}">
                                            {{ htmlspecialchars($row->status) }}
                                        </span>
                                    </div>
                                </td>

                                <!-- Action Buttons -->
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end items-center gap-1">
                                        <!-- Edit Button -->
                                        <form action="{{ route('updateTemu', ['id' => $row->idreservasi_dokter]) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                class="w-8 h-8 rounded-full border border-green-600 text-green-600 hover:bg-green-600 hover:text-white transition-colors flex items-center justify-center"
                                                title="Update">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7">
                                                    </path>
                                                </svg>
                                            </button>
                                        </form>

                                        <!-- Delete Button -->
                                        <form action="{{ route('deleteTemu', ['id' => $row->idreservasi_dokter]) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="w-8 h-8 rounded-full border border-red-600 text-red-600 hover:bg-red-600 hover:text-white transition-colors flex items-center justify-center"
                                                title="Delete"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
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
                                        <p class="font-medium">Tidak ada data role.</p>
                                        <p class="text-sm text-gray-400 mt-1">Klik "Add Role" untuk menambahkan data baru.</p>
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

<x-temu-modal :dokter="$dokter" :pet="$pet" />

@push('scripts')
    <script>
        function openEditModal(roleId) {

            const modal = document.getElementById('updateModal');
            const modalContent = document.getElementById('modalContent');

            if (!modal) {
                return;
            }

            // Show modal
            modal.style.display = 'flex';
            modal.classList.remove('hidden');

            // Trigger animation
            setTimeout(() => {
                modalContent.classList.remove('hidden', 'scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10);

            // Fetch user data
            fetch(`/getRolebyId/${roleId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok: ' + response.status);
                    }
                    return response.json();
                })
                .then(data => {

                    // Fill form with user data
                    document.getElementById('edit_idrole').value = data.idrole;
                    document.getElementById('nama_update').value = data.nama_role;

                    // Update form action
                    const form = document.getElementById('updateForm');
                    form.action = `/updateRole/${data.idrole}`;
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                    alert('Gagal memuat data user: ' + error.message);
                });
        }

        function closeUpdateModal() {
            const modal = document.getElementById('updateModal');
            const modalContent = document.getElementById('modalContent');

            if (modal) {
                // Add closing animation
                modalContent.classList.remove('scale-100', 'opacity-100');
                modalContent.classList.add('scale-95', 'opacity-0');

                // Hide modal after animation
                setTimeout(() => {
                    modal.style.display = 'none';
                    modal.classList.add('hidden');
                }, 200);
            }
        }

        // Close modal when clicking outside
        document.addEventListener('click', function (event) {
            const modal = document.getElementById('updateModal');
            if (event.target === modal) {
                closeUpdateModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closeUpdateModal();
            }
        });
    </script>
@endpush