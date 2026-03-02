<x-app-layout>
    <div class="p-6">

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-gray-800">
                Data Peminjaman
            </h1>

            <a href="{{ route('loans.create') }}"
            class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:opacity-90 text-white px-5 py-2 rounded-lg shadow-md transition">
            + Tambah Peminjaman
            </a>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full text-sm text-left">

        <!-- HEADER -->
        <thead class="bg-blue-600 text-white">
            <tr>
                <th class="px-6 py-3">No</th>
                <th class="px-6 py-3">Asset</th>
                <th class="px-6 py-3">Peminjam</th>
                <th class="px-6 py-3">Tanggal Pinjam</th>
                <th class="px-6 py-3">Tanggal Kembali</th>
                <th class="px-6 py-3 text-center">Status</th>
            </tr>
        </thead>

        <tbody class="text-gray-700">
            @forelse($loans as $index => $loan)
                <tr class="border-b hover:bg-blue-50 transition">

                    <!-- KOLOM NO (WARNA BERBEDA) -->
                    <td class="px-6 py-3 bg-gray-50 font-semibold text-gray-600">
                        {{ $index + 1 }}
                    </td>

                    <td class="px-6 py-3 font-medium">
                        {{ $loan->asset->nama_asset ?? '-' }}
                    </td>

                    <td class="px-6 py-3">
                        {{ $loan->nama_peminjam }}
                    </td>

                    <td class="px-6 py-3">
                        {{ $loan->tanggal_pinjam }}
                    </td>

                    <td class="px-6 py-3">
                        {{ $loan->tanggal_kembali ?? '-' }}
                    </td>

                    <td class="px-6 py-3 text-center">
                        @if($loan->tanggal_kembali)
                            <span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                Selesai
                            </span>
                        @else
                            <span class="bg-yellow-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                Dipinjam
                            </span>
                        @endif
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-6 text-center text-gray-400">
                        Belum ada data peminjaman
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

    </div>
</x-app-layout>