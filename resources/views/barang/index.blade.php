<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Master Barang") }}
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
                    <div class="min-w-full flex items-center mt-3">
                        <table class="w-full text-sm text-left shadow-lg">
                            <thead class="text-xs uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Kode Kategori
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Kategori
                                    </th>
                                    <!-- <th scope="col" class="px-6 py-3">Brand</th>
                                    <th scope="col" class="px-6 py-3">UOM</th>
                                    <th scope="col" class="px-6 py-3">Price</th>
                                    <th scope="col" class="px-6 py-3">Stock</th> -->
                                    <th
                                        scope="col"
                                        class="px-6 py-3 flex justify-center"
                                    >
                                        Option
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($kategoris as $kategori)
                                <tr class="bg-white border-b">
                                    <th
                                        scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                                    >
                                        {{$kategori->kode_kategori}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$kategori->kategori}}
                                    </td>
                                    <td
                                        class="px-6 py-4 flex justify-center items-center"
                                    >
                                        @role('gudang|Super-Admin')
                                        <a
                                            href="{{
                                                route('add.stock-barang', $kategori->id)
                                            }}"
                                            type="button"
                                            class="focus:outline-none max-w-[50%] bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900"
                                        >
                                            Tambah List Pengisian
                                        </a>
                                        @endrole
                                        <a
                                            href="{{
                                                route('view.stock-barang', $kategori->id)
                                            }}"
                                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                        >
                                            Tampilkan Stock
                                        </a>
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
                        {{ $kategoris->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
