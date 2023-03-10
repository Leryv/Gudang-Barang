<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __("Transaksi Masuk") }}
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
                        @if(session()->has('success'))
                        <div
                            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                            role="alert"
                        >
                            <strong class="font-bold">Transaksi</strong>
                            <span class="block sm:inline">
                                {{ session("success") }}</span
                            >
                        </div>
                        @endif @if(session()->has('delete'))
                        <div
                            class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                            role="alert"
                        >
                            <strong class="font-bold">Transaksi</strong>
                            <span class="block sm:inline">
                                {{ session("delete") }}</span
                            >
                        </div>
                        @endif

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
                                    <!-- <th scope="col" class="px-6 py-3">
                                        Tanggal
                                    </th> -->
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Pengguna
                                    </th>
                                    <th scope="col" class="px-6 py-3">Stock</th>
                                    <th scope="col" class="px-6 py-3">
                                        Total Harga
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Option
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
                                        {{$transaksi->kode_transaksi}}
                                    </th>
                                    <td class="px-6 py-4 text-gray-600">
                                        {{$transaksi->barang->brand->brand}}
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">
                                        {{$transaksi->jumlah_permintaan}}
                                    </td>
                                    <!-- <td class="px-6 py-4 text-gray-600">
                                        {{$transaksi->created_at->format('d-m-y')}}
                                    </td> -->
                                    <td
                                        class="px-6 py-4 text-red-500 font-bold capitalize"
                                    >
                                        <div
                                            class="w-max flex justify-center items-center bg-white shadow-lg rounded-lg text-sm px-2 py-2 mr-2 mb-2"
                                        >
                                            {{$transaksi->status}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">
                                        {{$transaksi->user->name}}
                                    </td>
                                    @if($transaksi->barang->stock <
                                    $transaksi->jumlah_permintaan)
                                    <td class="px-6 py-4 text-red-500">
                                        ! {{$transaksi->barang->stock}}
                                    </td>
                                    @else
                                    <td class="px-6 py-4 text-green-600">
                                        {{$transaksi->barang->stock}}
                                    </td>
                                    @endif

                                    <td class="px-6 py-4 text-gray-600">
                                        Rp. {{$transaksi->total_harga}}
                                    </td>

                                    <td
                                        class="px-6 py-4 text-gray-600 flex justify-center items-center"
                                    >
                                        @if($transaksi->barang->stock >=
                                        $transaksi->jumlah_permintaan )
                                        <form
                                            class="flex gap-5"
                                            method="post"
                                            action="{{
                                        route(
                                            'update.status.request',$transaksi->id
                                        )
                                    }}"
                                        >
                                            @csrf @method("PATCH")

                                            <button
                                                class="focus:outline-none bg-white hover:bg-blue-500 text-blue-600 hover:text-white focus:ring-4 focus:ring-blue-300 font-semibold border border-blue-500 rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 shadow"
                                            >
                                                Approve
                                            </button>
                                        </form>
                                        @else
                                        <p
                                            class="w-max text-red-500 text-center font-bold capitalize flex justify-center items-center bg-white shadow-lg rounded-lg text-sm px-2 py-2 mr-2 mb-2"
                                        >
                                            Sorry Insufficient
                                            <br />
                                            Stock
                                        </p>
                                        @endif

                                        <form
                                            class="flex gap-5"
                                            method="post"
                                            action="{{
                                                route(
                                                    'delete.request.stock.barang',$transaksi->id
                                                )
                                            }}"
                                        >
                                            @csrf @method("DELETE")
                                            <button
                                                class="focus:outline-none bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 text-white"
                                                onclick="return confirm('Are You Sure?')"
                                            >
                                                Decline
                                            </button>
                                        </form>
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
