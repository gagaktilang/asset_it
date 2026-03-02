<x-app-layout>
    <div class="min-h-screen bg-gray-50 flex justify-center items-start py-10">

        <div class="w-full max-w-3xl">

            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800">
                    Tambah Asset Baru
                </h1>
                <p class="text-gray-500 mt-1">
                    Isi informasi asset yang akan ditambahkan ke sistem
                </p>
            </div>

            <!-- Card Form -->
            <div class="bg-white rounded-2xl shadow-lg p-8">

                <form action="{{ route('assets.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-2 gap-6">

                        <!-- Nama Asset -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Nama Asset
                            </label>
                            <input type="text" name="nama_asset"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-gray-400 focus:outline-none transition"
                                placeholder="Contoh: Laptop Asus ROG"
                                required>
                        </div>

                        <!-- Kode Asset -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Kode Asset
                            </label>
                            <input type="text" name="kode_asset"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-gray-400 focus:outline-none transition"
                                placeholder="AST-001"
                                required>
                                @error('kode_asset')
    <p class="text-red-500 text-sm mt-1">
        {{ $message }}
    </p>
@enderror
                        </div>

                        <!-- Kategori -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Kategori
                            </label>
                            <input type="text" name="kategori"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-gray-400 focus:outline-none transition"
                                placeholder="Elektronik"
                                required>
                        </div>

                        <!-- Lokasi -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Lokasi
                            </label>
                            <input type="text" name="lokasi"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-gray-400 focus:outline-none transition"
                                placeholder="Ruang IT"
                                required>
                        </div>

                    </div>

                    <!-- Button -->
                    <div class="flex justify-end mt-8">
                        <button type="submit"
                            class="bg-gray-800 hover:bg-black text-white px-8 py-3 rounded-xl shadow-md transition duration-200">
                            Simpan Asset
                        </button>
                    </div>

                </form>

            </div>

        </div>

    </div>
</x-app-layout>