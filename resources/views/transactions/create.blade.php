<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Pinjam Asset</h2>
    </x-slot>

    <div class="p-6">
        <form method="POST" action="{{ route('transactions.store') }}"
              class="bg-white p-6 rounded-2xl shadow">
            @csrf

            <label class="block mb-2">Pilih Asset</label>
            <select name="asset_id"
                class="w-full border rounded-xl mb-4">
                @foreach($assets as $asset)
                    <option value="{{ $asset->id }}">
                        {{ $asset->nama_asset }}
                    </option>
                @endforeach
            </select>

            <button class="bg-green-600 text-white px-4 py-2 rounded-xl">
                Pinjam
            </button>
        </form>
    </div>
</x-app-layout>