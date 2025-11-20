{{-- Modal Create --}}
@props([
    'pet' => [],
    'dokter' => []
])

<el-dialog>
    <dialog id="create-temu" aria-labelledby="dialog-title"
        class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
        <el-dialog-backdrop
            class="fixed inset-0 bg-gray-900/50 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

        <div tabindex="0" class="flex min-h-full items-center justify-center p-4 sm:p-0">
            <el-dialog-panel
                class="relative w-full max-w-md transform overflow-hidden rounded-lg bg-white shadow-xl transition-all sm:my-8">

                <form action="{{ route('createTemu') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="bg-white px-6 pt-5 pb-4">
                        <div class="text-left">
                            <h3 id="dialog-title" class="text-lg font-semibold text-gray-900">Add Jadwal Temu</h3>
                            <p class="mt-1 text-sm text-gray-500">Fill in the details below to register the new schedule.</p>
                        </div>

                        <div class="mt-5 space-y-4">
                            <!-- Pet -->
                            <div>
                                <label for="pet" class="block text-sm font-medium text-gray-700">Pet</label>
                                <select name="idpet" id="pet" required
                                    class="jenis-kelamin-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-600 focus:ring-indigo-600 sm:text-sm px-3 py-2 border text-gray-400"
                                    onchange="this.classList.toggle('text-gray-400', this.value === ''); this.classList.toggle('text-gray-900', this.value !== '');">
                                    <option value="" disabled selected>Select pet...</option>
                                    @foreach ($pet as $row)
                                        <option value="{{ $row->idpet }}">{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="dokter" class="block text-sm font-medium text-gray-700">Dokter</label>
                                <select name="idrole_user" id="dokter" required
                                    class="jenis-kelamin-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-600 focus:ring-indigo-600 sm:text-sm px-3 py-2 border text-gray-400"
                                    onchange="this.classList.toggle('text-gray-400', this.value === ''); this.classList.toggle('text-gray-900', this.value !== '');">
                                    <option value="" disabled selected>Select doctor...</option>
                                    @foreach ($dokter as $row)
                                        <option value="{{ $row->idrole_user }}">{{ $row->user->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>

                    <!-- Footer Buttons -->
                    <div class="bg-gray-50 px-6 py-3 flex flex-row-reverse gap-3">
                        <button type="submit"
                            class="inline-flex justify-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Save Jadwal
                        </button>
                        <button type="button" command="close" commandfor="create-temu"
                            class="inline-flex justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Cancel
                        </button>
                    </div>
                </form>
            </el-dialog-panel>
        </div>
    </dialog>
</el-dialog>