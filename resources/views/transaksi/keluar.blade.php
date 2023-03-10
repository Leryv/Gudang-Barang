<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __("Transaksi Keluar") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h5 class="text-gray-500 m-5">
                <a href="">Transaksi</a> /
                <a href="{{ route('transaksi.masuk') }}">Barang Masuk</a>
            </h5>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center">
                    <div class="min-w-full grid gap-4 items-center p-6">
                        <table
                            class="w-full text-sm text-left text-gray-500 shadow-md"
                        >
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50"
                            >
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Referensi
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Supplier
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jumlah Permintaan
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tanggal
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Pengguna
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jumlah Harga
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transaksis as $transaksi)
                                <tr class="bg-white border-b">
                                    <th
                                        scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                                    >
                                        {{ $transaksi->kode_transaksi}}
                                    </th>
                                    <td class="px-6 py-4 text-gray-600">
                                        {{ $transaksi->barang->brand->brand}}
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">
                                        {{ $transaksi->jumlah_permintaan}}
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">
                                        {{ $transaksi->created_at->format('d-m-y')}}
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">
                                        {{$transaksi->user->name}}
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">
                                        Rp.
                                        {{number_format($transaksi->total_harga)}}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-green-500 font-bold capitalize"
                                    >
                                        <div
                                            class="w-max flex justify-center items-center bg-white shadow-lg rounded-lg text-sm px-2 py-2 mr-2 mb-2"
                                        >
                                            {{ $transaksi->status}}
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4 text-gray-600">
                                        Transaksi Tidak Tersedia
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="m-5">
                    <div class="">
                        {{ $transaksis->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
