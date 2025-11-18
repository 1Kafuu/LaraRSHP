@extends('layouts.content')

@push('page')
'{{ $pageName ?? 'datapet' }}'
@endpush

@section('path', 'Data Hewan')
@section('title', 'Data Hewan')

@section('content')
    <div class="container-fluid py-4">
        <h1 class="mb-4 text-xl font-bold text-gray-800">Welcome to Data Hewan</h1>

        <!-- Card Container -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <!-- Header -->
            <div class="flex justify-between items-center p-5 border-b border-gray-100">
                <h5 class="text-lg font-semibold text-gray-800 mb-0">Hewan List</h5>
                <button command="show-modal" commandfor="create-pet" class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-full shadow-sm transition-colors flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add Hewan
                </button>
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
                            <th class="px-6 py-3 text-left">SL.</th>
                            <th class="px-6 py-3 text-left">Nama</th>
                            <th class="px-6 py-3 text-left">Tanggal Lahir</th>
                            <th class="px-6 py-3 text-left">Warna Tanda</th>
                            <th class="px-6 py-3 text-left">Jenis Kelamin</th>
                            <th class="px-6 py-3 text-left">Pemilik</th>
                            <th class="px-6 py-3 text-left">Ras</th>
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
                                    {{ $row->nama }}
                                </td>

                                <!-- Tanggal Lahir -->
                                <td class="px-6 py-4 text-gray-600">
                                    {{ \Carbon\Carbon::parse($row->tanggal_lahir)->format('d M Y') }}
                                </td>

                                <!-- Warna Tanda -->
                                <td class="px-6 py-4 text-gray-600">
                                    {{ $row->warna_tanda ?? '-' }}
                                </td>

                                <!-- Jenis Kelamin -->
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full 
                                        {{ $row->jenis_kelamin === 'Jantan' ? 'bg-blue-100 text-blue-700' : 'bg-pink-100 text-pink-700' }}">
                                        {{ $row->jenis_kelamin }}
                                    </span>
                                </td>

                                <!-- Pemilik -->
                                <td class="px-6 py-4 text-gray-600">
                                    {{ $row->pemilik->user->nama ?? 'Tidak Ada' }}
                                </td>

                                <!-- Ras -->
                                <td class="px-6 py-4 text-gray-600">
                                    {{ $row->rashewan->nama_ras ?? '-' }}
                                </td>

                                <!-- Action Buttons -->
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end items-center gap-1">
                                        <!-- Edit Button -->
                                        <button
                                            type="button"
                                            onclick="openEditModal({{ $row->idpet }})"
                                            class="w-8 h-8 rounded-full border border-indigo-600 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-all duration-200 flex items-center justify-center"
                                            title="Edit Hewan">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                        </button>

                                        <!-- Delete Button -->
                                        <form action="{{ route('deletePet', ['id' => $row->idpet]) }}" method="POST" class="inline">
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
                                <td colspan="8" class="px-6 py-12 text-center text-gray-500 text-base">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                        </svg>
                                        <p class="font-medium">Tidak ada data hewan.</p>
                                        <p class="text-sm text-gray-400 mt-1">Klik "Add Hewan" untuk menambahkan data baru.</p>
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

<x-pet-modal :pemilik="$pemilik" :ras="$ras"/>

@push('scripts')
    <script>
        function openEditModal(petId) {

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
                modalContent.classList.remove('hidden','scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10);

            // Fetch user data
            fetch(`/getPetbyId/${petId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok: ' + response.status);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data);
                    // Fill form with user data
                    document.getElementById('edit_idras').value = data.idras_hewan;
                    document.getElementById('edit_idpemilik').value = data.idpemilik;
                    document.getElementById('nama_update').value = data.nama;
                    document.getElementById('tanggal_lahir_update').value = data.tanggal_lahir;
                    document.getElementById('warna_tanda_update').value = data.warna_tanda;
                    document.getElementById('jenis_kelamin_update').value = data.jenis_kelamin;
                    document.getElementById('pemilik_update').value = data.pemilik.idpemilik;
                    document.getElementById('nama_ras_update').value = data.rashewan.idras_hewan;


                    // Update form action
                    const form = document.getElementById('updateForm');
                    form.action = `/updatePet/${data.idpet}`;
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