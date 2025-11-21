@props([
  'tindakan' => [],
])

{{-- Modal Create --}}
<div id="createModal" style="display: none;"
  class="fixed inset-0 z-100000 hidden flex items-center justify-center bg-gray-900/50 transition-opacity duration-300 overflow-y-auto">
  <div
    class="bg-white rounded-lg shadow-xl w-full max-w-2xl mx-4 transform transition-all duration-300 scale-95 opacity-0 hidden"
    id="createContent">
    <!-- Modal Header -->
    <div class="px-6 py-4 border-b border-gray-200">
      <h3 class="text-lg font-semibold text-gray-900">Tambah Rekam Medis</h3>
      <p class="mt-1 text-sm text-gray-500">Isikan data rekam medis.</p>
    </div>

    <!-- Modal Body -->
    <form action="{{ route('createRekam') }}" method="POST" class="px-6 py-5 space-y-5">
      @csrf
      <input type="hidden" name="idreservasi_dokter" id="idtemu">
      <input type="hidden" name="idpet" id="idpet">
      <input type="hidden" name="idrole_user" id="idrole_user">

      <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div>
          <label for="anamnesa_buat" class="block text-sm font-medium text-gray-700 mb-1">
            Anamnesa
          </label>
          <input type="text" name="anamnesa" id="anamnesa_buat" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 
                                  focus:ring-indigo-500 focus:border-indigo-500 transition"
            placeholder="Masukkan anamnesa...">
        </div>

        <div>
          <label for="temuan_buat" class="block text-sm font-medium text-gray-700 mb-1">
            Temuan Klinis
          </label>
          <input type="text" name="temuan_klinis" id="temuan_buat" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 
                                  focus:ring-indigo-500 focus:border-indigo-500 transition"
            placeholder="Masukkan temuan klinis...">
        </div>
      </div>

      <div>
        <label for="diagnosa_buat" class="block text-sm font-medium text-gray-700 mb-1">
          Diagnosa
        </label>
        <input type="text" name="diagnosa" id="diagnosa_buat" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 
                              focus:ring-indigo-500 focus:border-indigo-500 transition"
          placeholder="Masukkan diagnosa...">
      </div>

      <div>
        <label for="detail_buat" class="block text-sm font-medium text-gray-700 mb-1">
          Detail
        </label>
        <textarea name="detail" id="detail_buat" rows="4" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 
                                 focus:ring-indigo-500 focus:border-indigo-500 transition resize-none"
          placeholder="Masukkan detail pengobatan / catatan..."></textarea>
      </div>

      <div>
        <label for="tindakan_buat" class="block text-sm font-medium text-gray-700 mb-1">
          Tindakan
        </label>
        <select name="idkode_tindakan_terapi" id="tindakan_buat" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 
                               focus:ring-indigo-500 focus:border-indigo-500 transition 
                               text-gray-900">
          <option value="" disabled selected>Pilih tindakan...</option>
          @foreach ($tindakan as $row)
          <option value="{{ $row->idkode_tindakan_terapi }}">{{ $row->deskripsi_tindakan_terapi }}</option>
          @endforeach
        </select>
      </div>

      <!-- Modal Footer -->
      <div class="px-6 py-4 bg-gray-50 rounded-b-lg flex justify-end space-x-3">
        <button type="button" onclick="closeCreateModal()"
          class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200">
          Close
        </button>
        <button type="submit"
          class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200">
          Save Rekam
        </button>
      </div>
    </form>
  </div>
</div>

<!-- Update User Modal -->
<div id="updateModal" style="display: none;"
  class="fixed inset-0 z-100000 hidden flex items-center justify-center bg-gray-900/50 transition-opacity duration-300">
  <div
    class="bg-white rounded-lg shadow-xl w-full max-w-2xl mx-4 transform transition-all duration-300 scale-95 opacity-0 hidden"
    id="modalContent">
    <!-- Modal Header -->
    <div class="px-6 py-4 border-b border-gray-200">
      <h3 class="text-lg font-semibold text-gray-900">Update Rekam Medis</h3>
      <p class="mt-1 text-sm text-gray-500">Perbarui informasi rekam medis ini.</p>
    </div>

    <!-- Modal Body -->
    <form id="updateForm" method="POST" class="px-6 py-5 space-y-5">
      @csrf
      @method('PUT')
      <input type="hidden" name="idrekam_medis" id="edit_idrekam">

      <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div>
          <label for="anamnesa_update" class="block text-sm font-medium text-gray-700 mb-1">
            Anamnesa
          </label>
          <input type="text" name="anamnesa" id="anamnesa_update" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 
                                  focus:ring-indigo-500 focus:border-indigo-500 transition"
            placeholder="Masukkan anamnesa baru">
        </div>

        <div>
          <label for="temuan_update" class="block text-sm font-medium text-gray-700 mb-1">
            Temuan Klinis
          </label>
          <input type="text" name="temuan_klinis" id="temuan_update" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 
                                  focus:ring-indigo-500 focus:border-indigo-500 transition"
            placeholder="Masukkan temuan klinis">
        </div>
      </div>

      <div>
        <label for="diagnosa_update" class="block text-sm font-medium text-gray-700 mb-1">
          Diagnosa
        </label>
        <input type="text" name="diagnosa" id="diagnosa_update" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 
                              focus:ring-indigo-500 focus:border-indigo-500 transition"
          placeholder="Masukkan diagnosa">
      </div>

      <div>
        <label for="detail_update" class="block text-sm font-medium text-gray-700 mb-1">
          Detail
        </label>
        <textarea name="detail" id="detail_update" rows="4" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 
                                 focus:ring-indigo-500 focus:border-indigo-500 transition resize-none"
          placeholder="Masukkan detail pengobatan / catatan"></textarea>
      </div>

      <div>
        <label for="tindakan_update" class="block text-sm font-medium text-gray-700 mb-1">
          Tindakan
        </label>
        <select name="idkode_tindakan_terapi" id="tindakan_update" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 
                               focus:ring-indigo-500 focus:border-indigo-500 transition 
                               text-gray-900">
          <option value="" disabled selected>Pilih tindakan...</option>
          @foreach ($tindakan as $row)
          <option value="{{ $row->idkode_tindakan_terapi }}">{{ $row->deskripsi_tindakan_terapi }}</option>
          @endforeach
        </select>
      </div>

      <!-- Modal Footer -->
      <div class="px-6 py-4 bg-gray-50 rounded-b-lg flex justify-end space-x-3">
        <button type="button" onclick="closeUpdateModal()"
          class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200">
          Cancel
        </button>
        <button type="submit"
          class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200">
          Update
        </button>
      </div>
    </form>
  </div>
</div>


{{-- Detail Modal --}}
<div id="detailModal" style="display: none;"
  class="fixed inset-0 z-100000 hidden flex items-center justify-center bg-gray-900/50 transition-opacity duration-300">
  <div
    class="bg-white rounded-lg shadow-xl w-full max-w-2xl mx-4 pt-2 pb-2 transform transition-all duration-300 scale-95 opacity-0 hidden max-h-screen overflow-y-auto"
    id="detailContent">
    <!-- Modal Header -->
    <div class="px-6 py-4 border-b border-gray-200">
      <h3 class="text-lg font-semibold text-gray-900">Detail Rekam Medis</h3>
    </div>

    <!-- Modal Body -->
    <form class="px-6 py-5 space-y-5">
      <input type="hidden" name="idrekam_medis" id="idrekam">

      <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div>
          <label for="anamnesa" class="block text-sm font-medium text-gray-700 mb-1">
            Anamnesa
          </label>
          <input type="text" name="anamnesa" id="anamnesa" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 
                                  focus:ring-indigo-500 focus:border-indigo-500 transition"
            placeholder="Masukkan anamnesa" readonly>
        </div>

        <div>
          <label for="temuan" class="block text-sm font-medium text-gray-700 mb-1">
            Temuan Klinis
          </label>
          <input type="text" name="temuan_klinis" id="temuan" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 
                                  focus:ring-indigo-500 focus:border-indigo-500 transition"
            placeholder="Masukkan temuan klinis" readonly>
        </div>
      </div>

      <div>
        <label for="diagnosa" class="block text-sm font-medium text-gray-700 mb-1">
          Diagnosa
        </label>
        <input type="text" name="diagnosa" id="diagnosa" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 
                              focus:ring-indigo-500 focus:border-indigo-500 transition" placeholder="Masukkan diagnosa"
          readonly>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div>
          <label for="hewan" class="block text-sm font-medium text-gray-700 mb-1">
            Hewan
          </label>
          <input type="text" name="idpet" id="hewan" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 
                              focus:ring-indigo-500 focus:border-indigo-500 transition" placeholder="Masukkan Pemilik"
            readonly>
        </div>

        <div>
          <label for="dokter" class="block text-sm font-medium text-gray-700 mb-1">
            Dokter
          </label>
          <input type="text" name="idrole_user" id="dokter" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 
                              focus:ring-indigo-500 focus:border-indigo-500 transition" placeholder="Masukkan Dokter"
            readonly>
        </div>
      </div>

      <div>
        <label for="detail" class="block text-sm font-medium text-gray-700 mb-1">
          Detail
        </label>
        <textarea name="detail" id="detail" rows="4" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 
                                 focus:ring-indigo-500 focus:border-indigo-500 transition resize-none"
          placeholder="Masukkan detail pengobatan / catatan" readonly></textarea>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        <div>
          <label for="kategori" class="block text-sm font-medium text-gray-700 mb-1">
            Kategori
          </label>
          <input type="text" name="idkategori" id="kategori" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 
                              focus:ring-indigo-500 focus:border-indigo-500 transition" placeholder="Masukkan Pemilik"
            readonly>
        </div>

        <div>
          <label for="kategori_klinis" class="block text-sm font-medium text-gray-700 mb-1">
            Kategori Klinis
          </label>
          <input type="text" name="idkategori_klinis" id="kategori_klinis" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 
                              focus:ring-indigo-500 focus:border-indigo-500 transition" placeholder="Masukkan Dokter"
            readonly>
        </div>

        <div>
          <label for="tindakan" class="block text-sm font-medium text-gray-700 mb-1">
            Tindakan
          </label>
          <input type="text" name="idkode_tindakan_terapi" id="tindakan" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 
                              focus:ring-indigo-500 focus:border-indigo-500 transition" placeholder="Masukkan Dokter"
            readonly>
        </div>
      </div>

      <!-- Modal Footer -->
      <div class="px-6 py-4 bg-gray-50 rounded-b-lg flex justify-end space-x-3">
        <button type="button" onclick="closeDetailModal()"
          class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200">
          Close
        </button>
      </div>
    </form>
  </div>
</div>