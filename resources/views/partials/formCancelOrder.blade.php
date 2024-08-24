<form class="p-4 md:p-5 " method="POST" action="#" id="form-cancel-order">
    @csrf
    {{-- @method('') --}}
    <div>
        <p class="block mb-2 text-sm font-medium text-gray-900">Alasan
            Pembatalan
        </p>
        <div class="flex flex-col gap-2">
            <div>
                <input id="note_cancelled-1" type="radio" value="Ingin mengubah alamat" name="note_cancelled"
                    class="w-4 h-4 text-secondary bg-gray-100 border-gray-300 focus:ring-secondary focus:ring-2"
                    required>
                <label for="note_cancelled-1" class="ms-2 text-sm font-medium text-gray-900">Ingin mengubah
                    alamat</label>
            </div>
            <div>
                <input id="note_cancelled-2" type="radio" value="Ingin mengubah produk" name="note_cancelled"
                    class="w-4 h-4 text-secondary bg-gray-100 border-gray-300 focus:ring-secondary focus:ring-2"
                    required>
                <label for="note_cancelled-2" class="ms-2 text-sm font-medium text-gray-900">Ingin mengubah
                    produk</label>
            </div>
            <div>
                <input id="note_cancelled-3" type="radio" value="Tidak ingin membeli lagi" name="note_cancelled"
                    class="w-4 h-4 text-secondary bg-gray-100 border-gray-300 focus:ring-secondary focus:ring-2"
                    required>
                <label for="note_cancelled-3" class="ms-2 text-sm font-medium text-gray-900">Tidak ingin membeli
                    lagi</label>
            </div>
            <div>
                <input id="note_cancelled-4" type="radio" value="Lainnya" name="note_cancelled"
                    class="w-4 h-4 text-secondary bg-gray-100 border-gray-300 focus:ring-secondary focus:ring-2"
                    required>
                <label for="note_cancelled-4" class="ms-2 text-sm font-medium text-gray-900">Lainnya</label>
            </div>
        </div>
        @error('note_cancelled')
            <small class="text-red-600 mt-3 ml-6 block">{{ $message }}</small>
        @enderror
    </div>
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-end mt-3 gap-3">
        <button type="submit"
            class=" w-full lg:w-fit text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Batalkan
            Pesanan</button>
        <button data-modal-hide="cancel-order-modal" type="button" data-drawer-hide="drawer-cancel-order"
            aria-controls="drawer-cancel-order"
            class="w-full lg:w-fit py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-secondary focus:z-10 focus:ring-4 focus:ring-gray-100">Nanti
            Saja</button>
    </div>
</form>
