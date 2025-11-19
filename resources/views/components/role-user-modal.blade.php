@props([
    'roles' => [],
])

<!-- Update User Modal -->
<div id="updateModal" style="display: none;"
    class="fixed inset-0 z-50 hidden items-center justify-center backdrop-blur-sm transition-opacity duration-300">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4 transform transition-all duration-300 scale-95 opacity-0 hidden"
        id="modalContent">
        <!-- Modal Header -->
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Update Role User</h3>
            <p class="mt-1 text-sm text-gray-500">Perbarui role untuk <span id="user_name" class="font-medium"></span></p>
        </div>

        <!-- Modal Body -->
        <form id="updateRoleForm" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="iduser" id="edit_iduser">
            
            <div class="px-6 py-4 space-y-4">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th class="px-4 py-3">Nama Role</th>
                                <th class="px-4 py-3 text-center">Milik Role</th>
                                <th class="px-4 py-3 text-center">Role Aktif</th>
                            </tr>
                        </thead>
                        <tbody id="rolesTableBody">
                            @foreach ($roles as $role)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-4 py-3 font-medium text-gray-900">
                                        {{ $role->nama_role }}
                                        <input type="hidden" name="role_names[{{ $role->idrole }}]" value="{{ $role->nama_role }}">
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <input type="checkbox" 
                                               name="roles[]" 
                                               value="{{ $role->idrole }}"
                                               class="role-checkbox w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500 focus:ring-2"
                                               data-role-id="{{ $role->idrole }}">
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <input type="radio" 
                                               name="active_role" 
                                               value="{{ $role->idrole }}"
                                               class="active-radio w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 focus:ring-indigo-500 focus:ring-2"
                                               disabled>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="px-6 py-4 bg-gray-50 rounded-b-lg flex justify-end space-x-3">
                <button 
                    type="button" 
                    onclick="closeUpdateModal()" 
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200"
                >
                    Batal
                </button>
                <button 
                    type="submit" 
                    class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200"
                >
                    Update
                </button>
            </div>
        </form>
    </div>
</div>