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
                    <thead class="bg-gray-50 text-indigo-700 font-semibold text-xs uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-3 text-left">SL.</th>
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

                                    <!-- Nama -->
                                    <td class="px-6 py-4 font-medium text-gray-800">
                                        {{ $user['nama'] }}
                                    </td>

                                    <!-- Role -->
                                    <td class="px-6 py-4 text-gray-600">
                                        @if (count($user['roles']) > 0)
                                            <ul class="role-list mb-0 ps-3 space-y-1">
                                                @foreach ($user['roles'] as $role)
                                                                <li
                                                                    class="text-sm {{ $role['status'] ? 'text-green-700 font-medium' : 'text-gray-600' }}">
                                                                    {{ $role['nama_role'] }}
                                                                    <span
                                                                        class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
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
                                                title="Edit" onclick="openEditModal({{ $user['iduser'] }})">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                    </path>
                                                </svg>
                                            </button>

                                            <form action="{{ route('deleteRoleUser', ['id' => $user['iduser']]) }}"
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

<x-role-user-modal :roles="$roles" />

@push('scripts')
    <script>
        function openEditModal(userId) {
            const modal = document.getElementById('updateModal');
            const modalContent = document.getElementById('modalContent');

            if (!modal) {
                console.error('Modal element not found');
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

            // Fetch user role data
            fetch(`/getRoleUserbyId/${userId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok: ' + response.status);
                    }
                    return response.json();
                })
                .then(userRolesData => {
                    console.log('User roles data:', userRolesData);

                    // Reset semua checkbox dan radio
                    resetRoleForm();

                    // Process data berdasarkan struktur yang diberikan
                    if (userRolesData && Object.keys(userRolesData).length > 0) {
                        let userData = null;
                        const userRoles = [];

                        // Convert object to array dan ekstrak data
                        Object.values(userRolesData).forEach(item => {
                            if (item && item.user) {
                                userData = item.user; // Ambil data user dari item pertama
                            }
                            if (item && item.role) {
                                userRoles.push({
                                    idrole: item.idrole,
                                    idrole_user: item.idrole_user,
                                    nama_role: item.role.nama_role,
                                    status: item.status
                                });
                            }
                        });

                        if (userData) {
                            // Set user ID dan nama
                            document.getElementById('edit_iduser').value = userData.iduser;
                            document.getElementById('user_name').textContent = userData.nama || 'User';

                            // Set roles yang dimiliki user
                            userRoles.forEach(userRole => {
                                const roleCheckbox = document.querySelector(`.role-checkbox[value="${userRole.idrole}"]`);
                                if (roleCheckbox) {
                                    // Centang checkbox karena user memiliki role ini
                                    roleCheckbox.checked = true;

                                    // Cari radio button untuk role ini
                                    const activeRadio = document.querySelector(`.active-radio[value="${userRole.idrole}"]`);
                                    if (activeRadio) {
                                        // Aktifkan radio button
                                        activeRadio.disabled = false;

                                        // Centang radio button jika status aktif (1)
                                        if (userRole.status === 1) {
                                            activeRadio.checked = true;
                                        }
                                    }
                                }
                            });
                        }

                        // Update form action
                        const form = document.getElementById('updateRoleForm');
                        form.action = `/updateRoleUser/${userData.iduser}`;
                    }
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                    alert('Gagal memuat data user role: ' + error.message);
                });
        }

        function resetRoleForm() {
            const allCheckboxes = document.querySelectorAll('.role-checkbox');
            const allRadios = document.querySelectorAll('.active-radio');

            allCheckboxes.forEach(checkbox => {
                checkbox.checked = false;
            });

            allRadios.forEach(radio => {
                radio.checked = false;
                radio.disabled = true;
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

                    // Reset form ketika modal ditutup
                    document.getElementById('updateRoleForm').reset();
                    resetRoleForm();
                }, 200);
            }
        }

        // Event listener untuk checkbox role
        document.addEventListener('DOMContentLoaded', function () {
            document.addEventListener('change', function (e) {
                if (e.target.classList.contains('role-checkbox')) {
                    const roleId = e.target.value;
                    const correspondingRadio = document.querySelector(`.active-radio[value="${roleId}"]`);

                    if (correspondingRadio) {
                        correspondingRadio.disabled = !e.target.checked;
                        if (!e.target.checked) {
                            correspondingRadio.checked = false;
                        }
                    }
                }
            });
        });

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