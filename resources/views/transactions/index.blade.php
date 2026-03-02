<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Data Peminjaman</h2>
    </x-slot>

    <div class="p-6">
        <a href="{{ route('transactions.create') }}"
           class="bg-indigo-600 text-white px-4 py-2 rounded-xl">
            + Pinjam Asset
        </a>

        <div class="mt-4 bg-white p-6 rounded-2xl shadow">
            <table class="min-w-full text-sm">
                <thead>
                    <tr>
                        <th>Asset</th>
                        <th>User</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $t)
                    <tr>
                        <td>{{ $t->asset->nama_asset }}</td>
                        <td>{{ $t->user->name }}</td>
                        <td>{{ $t->tanggal_pinjam }}</td>
                        <td>{{ $t->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>