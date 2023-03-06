<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @role('penjual')
            {{ __("Restock Barang") }}
            @endrole @role('gudang|Super-Admin')
            {{ __("All Stock Barang") }}
            @endrole
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h5 class="text-gray-500 m-5 flex gap-3">
                <li class="list-none" class="font-bold">Master Barang</li>
                /
                <li class="list-none">Index</li>
            </h5>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center m-5">
                    <div class="min-w-full grid gap-2 items-center mt-3">
                        @if(session()->has('success'))
                        <div
                            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                            role="alert"
                        >
                            <span class="block sm:inline">
                                {{ session("success") }}</span
                            >
                        </div>
                        @endif
                        <table class="w-full text-sm text-left shadow-lg">
                            <thead class="text-xs uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Kategori
                                    </th>
                                    <th scope="col" class="px-6 py-3">Brand</th>
                                    <th scope="col" class="px-6 py-3">
                                        Satuan
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Kode Barang
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Barang
                                    </th>
                                    <th scope="col" class="px-6 py-3">Stock</th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 flex justify-center"
                                    >
                                        Option
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($barangs as $barang)
                                <tr class="bg-white border-b">
                                    <th
                                        scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                                    >
                                        {{$barang->kategori->kategori ?? "No Kategori"}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$barang->brand->brand}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$barang->satuan->satuan}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$barang->no_reg}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$barang->nama_barang}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$barang->stock}}
                                    </td>
                                    <td
                                        class="px-6 py-4 flex justify-center items-center"
                                    >
                                        @role('penjual|Super-Admin')
                                        <a
                                            href="{{
                                                route('request.stock.barang', $barang->id)
                                            }}"
                                            type="button"
                                            class="focus:outline-none bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900"
                                        >
                                            Buat Permintaan
                                        </a>
                                        @endrole @role('gudang|Super-Admin')
                                        <a
                                            href="{{
                                                route('edit.stock-barang', $barang->id)
                                            }}"
                                            type="button"
                                            class="focus:outline-none bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900"
                                        >
                                            Update Stock
                                        </a>
                                        @endrole
                                    </td>
                                </tr>
                                @empty
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4 text-gray-600">
                                        Barang Tidak Tersedia
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="m-5">
                    <div class="">
                        {{ $barangs->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
