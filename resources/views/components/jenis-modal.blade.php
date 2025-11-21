{{-- Modal Create --}}
<el-dialog>
  <dialog id="create-jenis" aria-labelledby="dialog-title" class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
    <el-dialog-backdrop class="fixed inset-0 bg-gray-900/50 transition-opacity data-closed:opacity-0 data-enter:durati  on-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>
    
    <div tabindex="0" class="flex min-h-full items-center justify-center p-4 sm:p-0">
      <el-dialog-panel class="relative w-full max-w-md transform overflow-hidden rounded-lg bg-white shadow-xl transition-all sm:my-8">
        
        <form action="{{ route('createJenisHewan') }}" method="POST" class="space-y-6">
          @csrf
          
          <div class="bg-white px-6 pt-5 pb-4">
            <div class="text-left">
              <h3 id="dialog-title" class="text-lg font-semibold text-gray-900">Add New Jenis Hewan</h3>
              <p class="mt-1 text-sm text-gray-500">Fill in the details below to create a new Jenis Hewan.</p>
            </div>

            <div class="mt-5 space-y-4">
              <!-- Username -->
              <div>
                <label for="nama_jenis_hewan" class="block text-sm font-medium text-gray-700">Nama Jenis Hewan</label>
                <input 
                  type="text" 
                  name="nama_jenis_hewan" 
                  id="nama_jenis_hewan" 
                  required 
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-600 focus:ring-indigo-600 sm:text-sm px-3 py-2 border"
                  placeholder="Enter jenis hewan name"
                >
              </div>
            </div>
          </div>

          <!-- Footer Buttons -->
          <div class="bg-gray-50 px-6 py-3 flex flex-row-reverse gap-3">
            <button 
              type="submit" 
              class="inline-flex justify-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            >
              Save Jenis Hewan
            </button>
            <button 
              type="button" 
              command="close" 
              commandfor="create-jenis" 
              class="inline-flex justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            >
              Cancel
            </button>
          </div>
        </form>
      </el-dialog-panel>
    </div>
  </dialog>
</el-dialog>

<!-- Update User Modal -->
<div id="updateModal" style="display: none;" class="fixed inset-0 z-100000 hidden items-center justify-center bg-gray-900/50 transition-opacity duration-300">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4 transform transition-all duration-300 scale-95 opacity-0 hidden" id="modalContent">
        <!-- Modal Header -->
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Update Jenis Hewan</h3>
            <p class="mt-1 text-sm text-gray-500">Perbarui nama hewan ini.</p>
        </div>

        <!-- Modal Body -->
        <form id="updateForm" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="idjenis_hewan" id="edit_idjenis">
            
            <div class="px-6 py-4 space-y-4">
                <!-- Username -->
                <div>
                    <label for="nama_update" class="block text-sm font-medium text-gray-700 mb-1">Nama Hewan</label>
                    <input 
                        type="text" 
                        name="nama_jenis_hewan" 
                        id="nama_update" 
                        required 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200"
                        placeholder="Enter new role name"
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
