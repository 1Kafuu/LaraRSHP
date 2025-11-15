<!-- Update User Modal -->
<div id="updateModal" class="fixed inset-0 z-50 hidden items-center justify-center backdrop-blur-sm transition-opacity duration-300">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4 transform transition-all duration-300 scale-95 opacity-0" id="modalContent">
        <!-- Modal Header -->
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Update Username</h3>
            <p class="mt-1 text-sm text-gray-500">Perbarui nama pengguna untuk akun ini.</p>
        </div>

        <!-- Modal Body -->
        <form id="updateForm" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="iduser" id="edit_iduser">
            
            <div class="px-6 py-4 space-y-4">
                <!-- Username -->
                <div>
                    <label for="nama_update" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <input 
                        type="text" 
                        name="nama" 
                        id="nama_update" 
                        required 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200"
                        placeholder="Enter new username"
                    >
                </div>
                
                <!-- Email (readonly) -->
                <div>
                    <label for="email_update" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email_update" 
                        readonly
                        class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 focus:outline-none transition-colors duration-200"
                    >
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="px-6 py-4 bg-gray-50 rounded-b-lg flex justify-end space-x-3">
                <button 
                    type="button" 
                    onclick="closeUpdateModal()" 
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200"
                >
                    Cancel
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