<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            IT Asset Management
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- STAT CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-2xl shadow">
                    <p class="text-gray-500 text-sm">Total Asset</p>
                    <h3 class="text-2xl font-bold">{{ $total }}</h3>
                </div>

                <div class="bg-green-500 text-white p-6 rounded-2xl shadow">
                    <p class="text-sm">Tersedia</p>
                    <h3 class="text-2xl font-bold">{{ $tersedia }}</h3>
                </div>

                <div class="bg-yellow-500 text-white p-6 rounded-2xl shadow">
                    <p class="text-sm">Dipakai</p>
                    <h3 class="text-2xl font-bold">{{ $dipakai }}</h3>
                </div>

                <div class="bg-red-500 text-white p-6 rounded-2xl shadow">
                    <p class="text-sm">Rusak</p>
                    <h3 class="text-2xl font-bold">{{ $rusak }}</h3>
                </div>
            </div>

            <!-- SEARCH & FILTER -->
            <div class="bg-white p-6 rounded-2xl shadow">
                <form method="GET" class="flex flex-col md:flex-row gap-4">

                    <input type="text" name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari asset..."
                        class="w-full md:w-1/3 rounded-xl border-gray-300">

                    <select name="status"
                        class="w-full md:w-1/4 rounded-xl border-gray-300">
                        <option value="">Semua Status</option>
                        <option value="Tersedia">Tersedia</option>
                        <option value="Dipakai">Dipakai</option>
                        <option value="Rusak">Rusak</option>
                    </select>

                    <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-xl">
                        Filter
                    </button>

                    <button onclick="openModal()"
                    class="bg-black text-white px-4 py-2 rounded-xl">
                    + Tambah
                    </button>

                </form>
            </div>

            <!-- TABLE -->
            <div class="bg-white p-6 rounded-2xl shadow overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="border-b text-gray-500">
                            <th class="py-3 text-left">No</th>
                            <th class="py-3 text-left">Kode</th>
                            <th class="py-3 text-left">Nama</th>
                            <th class="py-3 text-left">Kategori</th>
                            <th class="py-3 text-left">Lokasi</th>
                            <th class="py-3 text-left">Status</th>
                            <th class="py-3 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
@foreach($assets as $index => $asset)
<tr class="border-b hover:bg-gray-50 transition">

    <!-- No -->
    <td class="py-3 font-medium">
        {{ $index + $assets->firstItem() }}
    </td>

    <!-- Kode -->
    <td class="py-3">
        {{ $asset->kode_asset }}
    </td>

    <!-- Nama -->
    <td class="py-3">
        {{ $asset->nama_asset }}
    </td>

    <!-- Kategori -->
    <td class="py-3">
        {{ $asset->kategori }}
    </td>

    <!-- Lokasi -->
    <td class="py-3">
        {{ $asset->lokasi }}
    </td>

    <!-- Status -->
    <td class="py-3">
        <span class="px-3 py-1 rounded-full text-xs font-semibold
            @if($asset->status == 'Tersedia') bg-green-100 text-green-700
            @elseif($asset->status == 'Dipakai') bg-yellow-100 text-yellow-700
            @else bg-red-100 text-red-700 @endif">
            {{ $asset->status }}
        </span>
    </td>

    <!-- Action -->
    <td class="py-3 flex gap-2">
        <a href="{{ route('assets.edit', $asset->id) }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg text-xs">
            Edit
        </a>

        <form action="{{ route('assets.destroy', $asset->id) }}"
              method="POST"
              onsubmit="return confirm('Yakin hapus asset?')">
            @csrf
            @method('DELETE')
            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-xs">
                Delete
            </button>
        </form>
    </td>

</tr>
@endforeach
</tbody>
                </table>

                <div class="mt-6">
                    {{ $assets->links() }}
                </div>
            </div>

        </div>
    </div>
    <!-- MODAL TAMBAH ASSET -->
<div id="modal"
     class="hidden fixed inset-0 bg-black/40 backdrop-blur-sm items-center justify-center z-50">

    <div class="bg-white w-full max-w-2xl rounded-2xl shadow-2xl p-8 relative">

        <button onclick="closeModal()"
            class="absolute top-4 right-4 text-gray-400 hover:text-black text-xl">
            ✕
        </button>

        <h2 class="text-2xl font-bold mb-6">Tambah Asset</h2>

        <form action="{{ route('assets.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-2 gap-6">

                <input type="text" name="nama_asset" placeholder="Nama Asset"
                    class="border rounded-lg px-3 py-2">

                <input type="text" name="kode_asset" placeholder="Kode Asset"
                    class="border rounded-lg px-3 py-2">

                <input type="text" name="kategori" placeholder="Kategori"
                    class="border rounded-lg px-3 py-2">

                <input type="text" name="lokasi" placeholder="Lokasi"
                    class="border rounded-lg px-3 py-2">

                <select name="status"
                    class="border rounded-lg px-3 py-2 col-span-2">
                    <option value="Tersedia">Tersedia</option>
                    <option value="Dipakai">Dipakai</option>
                    <option value="Rusak">Rusak</option>
                </select>

            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button type="button"
                    onclick="closeModal()"
                    class="px-4 py-2 border rounded-lg">
                    Batal
                </button>

                <button type="submit"
                    class="px-6 py-2 bg-black text-white rounded-lg">
                    Simpan
                </button>
            </div>

        </form>

    </div>
</div>
<script>
function openModal() {
    document.getElementById('modal').classList.remove('hidden');
    document.getElementById('modal').classList.add('flex');
}

function closeModal() {
    document.getElementById('modal').classList.remove('flex');
    document.getElementById('modal').classList.add('hidden');
}
</script>
</x-app-layout>